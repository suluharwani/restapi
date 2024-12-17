<?php

namespace App\Traits;

trait HasImageUpload
{
    protected function handleImageUpload($file, $path)
    {
        if (!$file->isValid() || $file->hasMoved()) {
            return null;
        }
        
        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/' . $path, $newName);
        
        return $newName;
    }
    
    protected function deleteImage($filename, $path)
    {
        $filepath = ROOTPATH . 'public/uploads/' . $path . '/' . $filename;
        if (file_exists($filepath)) {
            unlink($filepath);
        }
    }
}