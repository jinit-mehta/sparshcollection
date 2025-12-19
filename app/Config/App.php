<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    public string $baseURL = 'https://sparshcollection-production.up.railway.app/';
    
    public string $allowedHostnames = [
        'sparshcollection-production.up.railway.app',
        'localhost',
        '127.0.0.1'
    ];
    
    public string $indexPage = '';
    public string $uriProtocol = 'REQUEST_URI';
    public string $defaultLocale = 'en';
    public bool $negotiateLocale = false;
    public array $supportedLocales = ['en'];
    public string $appTimezone = 'Asia/Kolkata';
    public string $charset = 'UTF-8';
    public bool $forceGlobalSecureRequests = true;
    public string $proxyIPs = '*';
    public string $CSRFTokenName = 'csrf_token_name';
    public string $CSRFHeaderName = 'X-CSRF-TOKEN';
    public string $CSRFCookieName = 'csrf_cookie_name';
    public int $CSRFExpire = 7200;
    public bool $CSRFRegenerate = true;
    public bool $CSRFRedirect = true;
    public string $CSRFSameSite = 'Lax';

    public function __construct()
    {
        parent::__construct();
        
        // Dynamic base URL from environment
        if (getenv('APP_BASE_URL')) {
            $this->baseURL = getenv('APP_BASE_URL');
        } elseif (isset($_ENV['APP_BASE_URL'])) {
            $this->baseURL = $_ENV['APP_BASE_URL'];
        }
    }
}