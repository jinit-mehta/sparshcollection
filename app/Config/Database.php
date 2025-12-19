<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;
    public string $defaultGroup = 'default';
    
    public array $default = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => '',
        'password'     => '',
        'database'     => '',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => false,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_unicode_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberConnect'=> null,
        'dateFormat'   => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    public function __construct()
    {
        parent::__construct();
        
        // Load Railway MySQL variables
        $this->default['hostname'] = getenv('MYSQLHOST') 
            ?: ($_ENV['MYSQLHOST'] ?? 'localhost');
        
        $this->default['database'] = getenv('MYSQLDATABASE') 
            ?: ($_ENV['MYSQLDATABASE'] ?? 'sparshcollection');
        
        $this->default['username'] = getenv('MYSQLUSER') 
            ?: ($_ENV['MYSQLUSER'] ?? 'root');
        
        $this->default['password'] = getenv('MYSQLPASSWORD') 
            ?: ($_ENV['MYSQLPASSWORD'] ?? '');
        
        $this->default['port'] = (int)(getenv('MYSQLPORT') 
            ?: ($_ENV['MYSQLPORT'] ?? 3306));
        
        // Enable debug in development only
        $this->default['DBDebug'] = (ENVIRONMENT !== 'production');
    }
}