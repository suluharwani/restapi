<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\ApiService;

class Auth extends BaseController
{
    protected $api;
    
    public function __construct()
    {
        $this->api = service('api');
    }
    
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('admin');
        }
        
        return view('auth/login');
    }
    
    public function attemptLogin()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
        
        $response = $this->api->post('login', [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ]);
        
        var_dump($response);
        die();
        if (!$response || !isset($response['token'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid credentials');
        }
        
        session()->set([
            'isLoggedIn' => true,
            'token' => $response['token']
        ]);
        
        return redirect()->to('admin');
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}