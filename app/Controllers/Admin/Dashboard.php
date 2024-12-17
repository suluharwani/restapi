<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $api;
    
    public function __construct()
    {
        $this->api = service('api');
    }
    
    public function index()
    {
        $data = [
            'users_count' => count($this->api->get('users') ?? []),
            'blogs_count' => count($this->api->get('blogs') ?? []),
            'projects_count' => count($this->api->get('projects') ?? []),
            'contacts_count' => count($this->api->get('contacts') ?? []),
            'recent_contacts' => array_slice($this->api->get('contacts') ?? [], 0, 5),
            'recent_blogs' => array_slice($this->api->get('blogs') ?? [], 0, 5)
        ];
        
        return view('admin/dashboard', $data);
    }
}