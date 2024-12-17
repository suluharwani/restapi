<?php

namespace App\Services;

use Config\Services;
use CodeIgniter\HTTP\CURLRequest;

class ApiService
{
    protected $client;
    protected $token;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = Services::curlrequest();
        $this->baseUrl = getenv('API_BASE_URL');
        $this->token = session()->get('token');
    }

    protected function headers()
    {
        return [
            'Authorization' => 'Bearer ' . $this->token,
            'Accept' => 'application/json'
        ];
    }

    public function get($endpoint)
    {
        try {
            $response = $this->client->get($this->baseUrl . $endpoint, [
                'headers' => $this->headers()
            ]);
            
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return null;
        }
    }

    public function post($endpoint, $data, $multipart = false)
    {
        try {
            $options = ['headers' => $this->headers()];
            
            if ($multipart) {
                $options['multipart'] = $this->buildMultipartData($data);
            } else {
                $options['form_params'] = $data;
            }
            
            $response = $this->client->post($this->baseUrl . $endpoint, $options);
            
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return null;
        }
    }

    public function put($endpoint, $data, $multipart = false)
    {
        try {
            $options = ['headers' => $this->headers()];
            
            if ($multipart) {
                $options['multipart'] = $this->buildMultipartData($data);
            } else {
                $options['form_params'] = $data;
            }
            
            $response = $this->client->put($this->baseUrl . $endpoint, $options);
            
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return null;
        }
    }

    public function delete($endpoint)
    {
        try {
            $response = $this->client->delete($this->baseUrl . $endpoint, [
                'headers' => $this->headers()
            ]);
            
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return null;
        }
    }

    protected function buildMultipartData($data)
    {
        $multipart = [];
        
        foreach ($data as $name => $value) {
            if ($value instanceof \CodeIgniter\Files\File) {
                $multipart[] = [
                    'name' => $name,
                    'contents' => fopen($value->getTempName(), 'r'),
                    'filename' => $value->getName()
                ];
            } else {
                $multipart[] = [
                    'name' => $name,
                    'contents' => $value
                ];
            }
        }
        
        return $multipart;
    }
}