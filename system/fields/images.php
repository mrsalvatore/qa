<?php

class fieldImages extends cmsFormField {

    public $title       = LANG_PARSER_IMAGES;
    public $sql         = 'text';
    public $allow_index = false;
    public $var_type    = 'array';

    public function getOptions(){

		$presets = cmsCore::getModel('images')->getPresetsList();
		$presets['original'] = LANG_PARSER_IMAGE_SIZE_ORIGINAL;

        return array(
            new fieldList('size_teaser', array(
                'title' => LANG_PARSER_IMAGE_SIZE_TEASER,
                'default' => 'small',
                'items' => $presets
            )),
            new fieldList('size_full', array(
                'title' => LANG_PARSER_IMAGE_SIZE_FULL,
                'default' => 'big',
                'items' => $presets
            )),
            new fieldListMultiple('sizes', array(
                'title' => LANG_PARSER_IMAGE_SIZE_UPLOAD,
                'default' => 0,
                'items' => $presets
            )),
            new fieldCheckbox('allow_import_link', array(
                'title' => LANG_PARSER_IMAGE_ALLOW_IMPORT_LINK
            )),
            new fieldCheckbox('first_image_emphasize', array(
                'title' => LANG_PARSER_FIRST_IMAGE_EMPHASIZE
            ))
        );

    }

    public function parse($value){

        $images = is_array($value) ? $value : cmsModel::yamlToArray($value);

        $html = '';

        $small_preset = false;
        $a_class = '';

        foreach($images as $key=>$paths){

            if (!isset($paths[$this->getOption('size_full')])){ continue; }

            if($this->getOption('first_image_emphasize') && !$small_preset){
                $small_preset = $this->getOption('size_full');
                $a_class = 'first_type_images';
            } else {
                $small_preset = 'small';
             }

            if(!empty($paths['original']) &&  strtolower(pathinfo($paths['original'], PATHINFO_EXTENSION)) === 'gif'){
                $html .= html_gif_image($paths, 'small', (empty($this->item['title']) ? $this->name : $this->item['title']).' '.$key, array('class'=>'img-'.$this->getName()));
            } else {
                $html .= '<a class="img-'.$this->getName().' '.$a_class.'" href="'.html_image_src($paths, $this->getOption('size_full'), true).'">'.html_image($paths, $small_preset, (empty($this->item['title']) ? $this->name : $this->item['title']).' '.$key).'</a>';
            }

        }

        if($html){
            $html .= '<script>$(function() { icms.modal.bindGallery(".img-'.$this->getName().'"); });</script>';
        }

        return $html;

    }

    public function store($value, $is_submitted, $old_value=null){

		$config = cmsConfig::getInstance();

		if (!is_array($old_value)){
			$old_value = cmsModel::yamlToArray($old_value);
		}

        foreach($old_value as $image){
            if (!is_array($value) || !in_array($image, $value)){
                foreach($image as $size => $image_url){
                    $image_path = $config->upload_path . $image_url;
                    @unlink($image_path);
                }
            }
        }

        $result = null;

        if (is_array($value)){
            $result = array();
            foreach ($value as $idx=>$paths){ $result[] = $paths; }
        }

        $sizes = $this->getOption('sizes');

        if (empty($sizes) || empty($result)) { return $result; }

        foreach($result as $image){
            foreach($image as $size => $image_url){
                if (!in_array($size, $sizes)){
                    $image_path = $config->upload_path . $image_url;
                    @unlink($image_path);
                }
            }
        }

        return $result;

    }

    public function delete($value){

        if (empty($value)) { return true; }

        if (!is_array($value)){ $value = cmsModel::yamlToArray($value); }

        $config = cmsConfig::getInstance();

        foreach($value as $images){
            foreach($images as $image_url){
                $image_path = $config->upload_path . $image_url;
                @unlink($image_path);
            }
        }

        return true;

    }

    public function getFilterInput($value=false) {

        return html_checkbox($this->name, (bool)$value);

    }

    public function applyFilter($model, $value) {
        return $model->filterNotNull($this->name);
    }

    public function getInput($value){

        $this->data['images'] = false;

        if($value){
            $this->data['images'] = is_array($value) ? $value : cmsModel::yamlToArray($value);
        }

        $this->data['sizes'] = $this->getOption('sizes');
        $this->data['allow_import_link'] = $this->getOption('allow_import_link');

        $this->data['images_controller'] = cmsCore::getController('images');

        return parent::getInput($value);

    }

}
