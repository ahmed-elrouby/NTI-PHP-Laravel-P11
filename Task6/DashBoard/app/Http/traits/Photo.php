<?php

namespace App\Http\traits;

trait Photo
{
    public function UploadPhoto($Image, $folder)
    {
        $photoName = time() . '.' .$Image->extension();
        $Image->move(public_path('images\\'.$folder.''), $photoName);
        return $photoName;
    }
    public function DeletePhoto($oldImage, $folder)
    {
        $oldImagepath=public_path('images\\'.$folder.'\\'.$oldImage.'');
        if(file_exists($oldImagepath))
        {
            unlink($oldImagepath);
            return True;
        }
        return False;
    }
}
