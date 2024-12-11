<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use App\Filters\AuthFilter;

class Filters extends BaseConfig
{
    public $aliases = [
        'auth' => AuthFilter::class
    ];

    public $globals = [
        'before' => [
            'auth' => ['except' => ['api/login', 'api/register']]
        ],
        'after' => [
            // 'toolbar',
        ]
    ];

    public $methods = [];
    public $filters = [];
}