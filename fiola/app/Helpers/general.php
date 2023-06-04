<?php

use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Storage;

function uploadImage($folder, $image)
{
    $extension = strtolower($image->getClientOriginalExtension());
    $filename = time() . rand(100, 1000) . '.' . $extension;
    if (Storage::disk('public')->exists($folder . '/' . $filename)) {
        Storage::disk('public')->delete($folder . '/' . $filename);
    }

    $image->move(storage_path('app/public/' . $folder), $filename);
    return $filename;
}
?>
