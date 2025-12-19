<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Cookie extends BaseConfig
{
    public string $prefix = 'sparsh_';
    public int $expires = 7200;
    public string $path = '/';
    public string $domain = '';
    public bool $secure = true;
    public bool $httponly = true;
    public string $samesite = 'Lax';
    public bool $raw = false;
}