<?php

namespace App\Services;

use Intervention\Image\ImageManager;

class ImageUploadService
{
    public function uploadPhoto($file, $path, $height = 300)
    {
        if ($file) {
            $imageName = time() . '-' . $file->getClientOriginalName();
            $destinationPath = public_path('storage/' . $path);

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image = ImageManager::gd()->read($file->getRealPath());

            // Use scale() instead of resize() to maintain aspect ratio properly
            $image = $image->scale(height: $height);

            $image->save($destinationPath . '/' . $imageName);

            return $path . $imageName;
        }

        return null;
    }
}
