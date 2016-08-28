<?php

	session_start();

	define('VALID_RUN', true);

	// Устанавливаем кодировку
	header('Content-type:text/html; charset=utf-8');
    header('X-Powered-By: ICMS');

    require_once 'bootstrap.php';

    if (cmsConfig::get('emulate_lag')) { usleep(350000); }

    // Инициализируем шаблонизатор
    $template = cmsTemplate::getInstance();

    if (href_to('auth', 'login') != $_SERVER['REQUEST_URI']){
        if (!cmsConfig::get('is_site_on') && !cmsUser::isAdmin()) {
            cmsCore::errorMaintenance();
        }
    }

    cmsEventsManager::hook('engine_start');
	/* if(isset($_REQUEST["uri"]) && !empty($_REQUEST["uri"]))
	$_SERVER['REQUEST_URI'] = $_REQUEST["uri"]; */
	// $_SERVER['REQUEST_URI'] = '/news';
	// var_dump('222', $_REQUEST["uri"]);
	// var_dump('333', $_SERVER['REQUEST_URI']);
	// exit;
    //Запускаем роутинг и контроллер
    $core->route($_SERVER['REQUEST_URI']);
	
	$core->runController();
    $core->runWidgets();

    //Выводим готовую страницу
    $template->renderPage();

    cmsEventsManager::hook('engine_stop');

    // Останавливаем кеш
    cmsCache::getInstance()->stop();
	if(!isset($_SESSION['get_contents'])){
		$homepage = file_get_contents('http://q-ans.loc/news');
		$_SESSION['get_contents'] = 1;
		flush($homepage);
	}