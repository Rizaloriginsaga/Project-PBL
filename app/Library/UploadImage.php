<?php

namespace App\Library;

use Illuminate\Http\UploadedFile;

class UploadImage
{
    public static $file_name;

    public static function image(UploadedFile $uploadedFile, $path, $filename = null)
    {
        if (!empty($uploadedFile)) {
            if ($filename == null) {
                Self::$file_name = time() . '.' . $uploadedFile->getClientOriginalExtension();
            } else {
                Self::$file_name = $filename . '.' . $uploadedFile->getClientOriginalExtension();
            }

            $uploadedFile->storeAs($path, Self::$file_name, 'public');

            return Self::$file_name;
        }
    }
}
