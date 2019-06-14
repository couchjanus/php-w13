<?php
  
    define('ROOT', realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR));
    const VIEWS = ROOT.'/App/Views/';
    const CONTROLLERS = ROOT.'/App/Controllers';
    const MODELS = ROOT.'/App/Models/';
    const CONFIG = ROOT.'/config/';
    
    const CORE = ROOT.DIRECTORY_SEPARATOR.'Core'.DIRECTORY_SEPARATOR;

    const EXT = '.php';
    const APPNAME = 'Great Shopaholic';
    const SLOGAN = 'Lets Build Cool Site';

    define('DB_CONFIG_FILE', CONFIG.'db.php');
    define('LOGS', ROOT.'/logs/');
    const SESSION_PREFIX = 'shop_';