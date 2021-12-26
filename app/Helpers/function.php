<?php

use Illuminate\Support\Facades\File;

if (!function_exists('checkActiveUrl')) {
    function checkActiveUrl($url) {
        return request()->is($url) ? 'active' : '';
    }
}

if (!function_exists('fileUpload')) {
    function fileUpload($file, $path, $name = null, $previousFileName = null) {
        $name = ($name ? $name : $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        if ($previousFileName) unlinkFile($previousFileName, $path);
        $path = 'uploads/' . $path;
        $file->move($path, $name);
        return $name;
    }
}

if (!function_exists('unlinkFile')) {
    function unlinkFile($fileName, $path) {
        $file = 'uploads/' . $path . '/' . $fileName;
        if(File::exists($file)) {
            File::delete($file);
        }
    }
}
