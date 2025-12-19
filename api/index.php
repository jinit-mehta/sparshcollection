<?php
// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Load our paths config file
require FCPATH . '../app/Config/Paths.php';

// Create the Paths instance
$paths = new Config\Paths();

// Load the framework bootstrap file
require rtrim($paths->systemDirectory, '\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';