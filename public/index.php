<?php

/**
 * CodeIgniter 4 Front Controller
 * Sparsh Collection - Production
 */

// Minimum PHP version check
$minPhpVersion = '8.1';
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    die("PHP {$minPhpVersion} or higher is required. Current: " . PHP_VERSION);
}

// Path to front controller
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

// Load paths config
$pathsConfig = FCPATH . '../app/Config/Paths.php';
require realpath($pathsConfig) ?: $pathsConfig;

$paths = new Config\Paths();

// Location of the framework bootstrap file
$bootstrap = rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';
require realpath($bootstrap) ?: $bootstrap;

// Load .env file if exists
$envFile = FCPATH . '../.env';
if (is_file($envFile)) {
    $dotenv = new \CodeIgniter\Config\DotEnv(FCPATH . '../');
    $dotenv->load();
}

// Launch CodeIgniter
$app = Config\Services::codeigniter();
$app->initialize();
$app->setContext('web');
$app->run();