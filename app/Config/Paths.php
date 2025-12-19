<?php
namespace Config;

use CodeIgniter\Config\Paths as BasePaths;

class Paths extends BasePaths
{
    public string $appDirectory = __DIR__ . '/..';
    public string $systemDirectory = __DIR__ . '/../../system';
    public string $writableDirectory = __DIR__ . '/../../writable';
    public string $publicDirectory = __DIR__ . '/../../';
    public string $testsDirectory = __DIR__ . '/../../tests';
}