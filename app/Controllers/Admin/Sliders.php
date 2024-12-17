<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Traits\HasDataTable;
use App\Traits\HasImageUpload;

class Sliders extends BaseController
{
    use HasDataTable, HasImageUpload;
    
    protected $api;
    
    public function __construct()
    {
        $this->api = service('api');
    }
    
    public function index()
    {
        $sliders = $this->api->get('sliders');
        
        $columns = [
            ['data' => 'title', 'title' => 'Title'],
            [
                'data' => 'image',
                'title' => 'Image',
                'formatter' => function($value) {
                    return '<img src="' . base_url('uploads/sliders/' . $value) . '" 
                            alt="Slider" class="h-16 w-24 object-cover rounded">';
                }
            ],
            [
                'data' => 'id',
                'title' => 'Actions',
                'formatter' => function($value) {
                    return '<div class="flex space-x-2">
                        <a href="' . site_url('admin/sliders/edit/' . $value) . '" 
                           class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="' . site_url('admin/sliders/delete/' . $value) . '" 
                           class="text-red-600 hover:text-red-900"
                           onclick="return confirm(\'Are you sure?\')">Delete</a>
                    </div>';
                }
            ]
        ];
        
        $data = [
            'title' => 'Sliders',
            'createUrl' => site_url('admin/sliders/create'),
            'data' => $sliders,
            'columns' => $columns,
            'config' => $this->getDataTableConfig($columns)
        ];
        
        return view('admin/sliders/index', $data);
    }
    
    public function create()
    {
        return view('admin/sliders/form');
    }
    
    public function store()
    {
        $rules = [
            'title' => 'required',
            'image' => 'uploaded[image]|max_size[image,4096]|is_image[image]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
        
        $image = $this->request->getFile('image');
        $imageName = $this->handleImageUpload($image, 'sliders');
        
        if (!$imageName) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to upload image');
        }
        
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName
        ];
        
        $response = $this->api->post('sliders', $data, true);
        
        if (!$response) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create slider');
        }
        
        return redirect()->to('admin/sliders')
            ->with('success', 'Slider created successfully');
    }
    
    public function edit($id)
    {
        $slider = $this->api->get('sliders/' . $id);
        
        if (!$slider) {
            return redirect()->to('admin/sliders')
                ->with('error', 'Slider not found');
        }
        
        return view('admin/sliders/form', ['slider' => $slider]);
    }
    
    public function update($id)
    {
        $rules = [
            'title' => 'required'
        ];
        
        if ($this->request->getFile('image')->isValid()) {
            $rules['image'] = 'uploaded[image]|max_size[image,4096]|is_image[image]';
        }
        
        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description')
        ];
        
        if ($this->request->getFile('image')->isValid()) {
            $image = $this->request->getFile('image');
            $imageName = $this->handleImageUpload($image, 'sliders');
            
            if (!$imageName) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to upload image');
            }
            
            $data['image'] = $imageName;
        }
        
        $response = $this->api->put('sliders/' . $id, $data, true);
        
        if (!$response) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update slider');
        }
        
        return redirect()->to('admin/sliders')
            ->with('success', 'Slider updated successfully');
    }
    
    public function delete($id)
    {
        $slider = $this->api->get('sliders/' . $id);
        
        if (!$slider) {
            return redirect()->to('admin/sliders')
                ->with('error', 'Slider not found');
        }
        
        $response = $this->api->delete('sliders/' . $id);
        
        if (!$response) {
            return redirect()->to('admin/sliders')
                ->with('error', 'Failed to delete slider');
        }
        
        $this->deleteImage($slider['image'], 'sliders');
        
        return redirect()->to('admin/sliders')
            ->with('success', 'Slider deleted successfully');
    }
}