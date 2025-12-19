<?php
// Path to the front controller
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
chdir(FCPATH);

// LOAD COMPOSER AUTOLOADER FIRST (critical fix)
require FCPATH . '../vendor/autoload.php';

// Load paths config
require FCPATH . '../app/Config/Paths.php';
$paths = new Config\Paths();

// Load framework bootstrap
require rtrim($paths->systemDirectory, '\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';