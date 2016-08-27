<?php

class actionGroupsGroupEditStaff extends cmsAction {

    public $lock_explicit_call = true;

    public function run($group){

         // проверяем наличие доступа
        if ($group['owner_id'] != $this->cms_user->id && !$this->cms_user->is_admin) { cmsCore::error404(); }

        $members = $this->model->getMembers($group['id']);
        $staff = $this->model->getMembers($group['id'], groups::ROLE_STAFF);

        if ($this->request->isAjax()){
            return $this->submit($group, $members, $staff);
        }

        return $this->cms_template->render('group_edit_staff', array(
            'id'      => $group['id'],
            'group'   => $group,
            'members' => $members,
            'staff'   => $staff,
            'user'    => $this->cms_user
        ));

    }

    public function submit($group, $members, $staff){

        $name = $this->request->get('name', '');
        $name = mb_strtolower(trim($name));

        $member = false;

        foreach($members as $user){
            if (mb_strtolower($user['nickname']) == $name && !isset($staff[$user['id']])){
                $member = $user;
                break;
            }
        }

        if ($member === false){
            return $this->cms_template->renderJSON(array(
                'error'   => true,
                'message' => sprintf(LANG_GROUPS_STAFF_NOT_MEMBER, $name)
            ));
        }

        $this->model->updateMembershipRole($group['id'], $member['id'], groups::ROLE_STAFF);

        return $this->cms_template->renderJSON(array(
            'error' => false,
            'name'  => $name,
            'html'  => $this->cms_template->render('group_edit_staff_item', array(
                    'member' => $member,
                    'group'  => $group
                ), new cmsRequest(array(), cmsRequest::CTX_INTERNAL)),
            'id'    => $member['id']
        ));

    }

}