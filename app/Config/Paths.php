<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Paths extends BaseConfig
{
    public string $systemDirectory = __DIR__ . '/../../system';
    public string $appDirectory = __DIR__ . '/..';
    public string $writableDirectory = __DIR__ . '/../../writable';
    public string $viewDirectory = __DIR__ . '/../Views';
}