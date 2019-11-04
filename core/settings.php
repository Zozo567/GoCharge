<?php

define('ROOT_PATH', realpath(dirname(__FILE__).'/../'));
define('CORE_PATH', ROOT_PATH.'/core');
define('LIB_PATH', ROOT_PATH.'/core/libraries');
define('MODEL_PATH', CORE_PATH.'/models');
define('FRONT_PATH', ROOT_PATH.'/front');
define('HTML_PATH', FRONT_PATH.'/html');
define('UPLOADS_PATH', ROOT_PATH.'/uploads');
define('IMG_PATH', UPLOADS_PATH.'/img');


// define('BOOT_DB', 1); // load DB
// define('BOOT_MODEL', 5); // load DB, model
// define('BOOT_FULL', 10); // load DB, model, template (default)

// define('DOMAIN', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ''); // current domain
// define('COOKIE_LIFE', 24); // cookie life in hours
// define('SESSION_ACTIVE_LIFE', 15); // session life in minutes
// define('IS_AUTH_REQUIRED', true);

// require_once CORE_PATH.'/db.params.php';

require_once CORE_PATH.'/gocharge.class.php';
