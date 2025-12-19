<?php

require __DIR__ . '/../vendor/autoload.php';

define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
define('ROOTPATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APPPATH', ROOTPATH . 'app' . DIRECTORY_SEPARATOR);
define('SYSTEMPATH', ROOTPATH . 'system' . DIRECTORY_SEPARATOR);
define('WRITEPATH', sys_get_temp_dir() . DIRECTORY_SEPARATOR);

require SYSTEMPATH . 'bootstrap.php';

$app = Config\Services::codeigniter();
$app->initialize();
$app->run();
