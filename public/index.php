<?php

/**
 * CodeIgniter 4 Front Controller
 */

$minPhpVersion = '8.1';
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    die("PHP {$minPhpVersion}+ required. Current: " . PHP_VERSION);
}

// Path constants
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Change to front controller directory
chdir(FCPATH);

// Load Paths config
require FCPATH . '../app/Config/Paths.php';

$paths = new Config\Paths();

// Load framework bootstrap
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Load .env if exists
if (is_file(FCPATH . '../.env')) {
    $dotenv = new \CodeIgniter\Config\DotEnv(FCPATH . '../');
    $dotenv->load();
}

// Run application
$app = Config\Services::codeigniter();
$app->initialize();
$app->setContext('web');
$app->run();