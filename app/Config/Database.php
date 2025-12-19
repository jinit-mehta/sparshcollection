<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    public string $defaultGroup = 'default';
    
    public array $default = [
        'DSN'      => '',
        'hostname' => '',
        'username' => '',
        'password' => '',
        'database' => '',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => false,
        'charset'  => 'utf8mb4',
        'DBCollat' => 'utf8mb4_unicode_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
    ];

    public function __construct()
    {
        parent::__construct();
        
        // Railway MySQL Connection
        $this->default['hostname'] = getenv('database.default.hostname') 
            ?: getenv('MYSQLHOST') 
            ?: 'mysql.railway.internal';
            
        $this->default['database'] = getenv('database.default.database') 
            ?: getenv('MYSQLDATABASE') 
            ?: 'railway';
            
        $this->default['username'] = getenv('database.default.username') 
            ?: getenv('MYSQLUSER') 
            ?: 'root';
            
        $this->default['password'] = getenv('database.default.password') 
            ?: getenv('MYSQLPASSWORD') 
            ?: '';
            
        $this->default['port'] = (int)(getenv('database.default.port') 
            ?: getenv('MYSQLPORT') 
            ?: 3306);
            
        $this->default['DBDriver'] = getenv('database.default.DBDriver') 
            ?: 'MySQLi';
    }
}