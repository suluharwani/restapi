<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use App\Filters\AuthFilter;

class Filters extends BaseConfig
{
    public $aliases = [
        'auth' => AuthFilter::class,
    ];

    public $globals = [
        // 'before' => [
        //     'honeypot',
        //     'csrf',
        // ],
        // 'after' => [
        //     'toolbar',
        //     'honeypot',
        // ],
    ];

    public $methods = [];

    public $filters = [];
}