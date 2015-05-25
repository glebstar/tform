<?php

define('TF_ROOT_DIR', dirname(__FILE__) . '/..');
define('TF_CODE_DIR', TF_ROOT_DIR . '/code');

// загружаем конфиги
require_once TF_ROOT_DIR . '/config/cfg.php';

error_reporting($mainCfg['error_level']);
ini_set('display_errors', $mainCfg['display_errors']);

session_start();

// определяем язык приложения
$lang = $mainCfg['default_lang'];
if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
}

if (isset($_GET['lang']) && ($_GET['lang'] == 'en' || $_GET['lang'] == 'ru' )) {
    $lang = $_GET['lang'];
    setcookie('lang', $lang, time() + 60 * 60 * 24 * 30, '/');
}
require_once TF_ROOT_DIR . '/config/lang/' . $lang . '.php';

require_once TF_CODE_DIR . '/Controller.php';
require_once TF_CODE_DIR . '/Controller/Main.php';

$controller = new Controller_Main();

$action = 'login';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


$controller->run($action);
