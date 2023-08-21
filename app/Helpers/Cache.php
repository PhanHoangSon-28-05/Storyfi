<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Cache
{
    public static function read($fileName)
    {
        if (file_exists(Storage::path($fileName))) {
            $data = Storage::get($fileName);
            return json_decode($data);
        }
        return false;
    }

    public static function get($fileName, $key)
    {
        $data = self::read($fileName);
        if (is_array($data) && isset($data[$key])) {
            return $data[$key];
        }
        return null;
    }


    public static function write($fileName, $variable)
    {
        Storage::put($fileName, $variable);
    }

    public static function delete($fileName)
    {
        Storage::delete($fileName);
    }
}
