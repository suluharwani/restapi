<?php

namespace Config;

use CodeIgniter\Config\BaseService;
use App\Services\ApiService;

class Services extends BaseService
{
    public static function api($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('api');
        }

        return new ApiService();
    }
}