<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class QrHelper
{

    public static function encrypt($data) {
        $string='';

        $i=0;
        $max=count($data);
        foreach ($data as $key => $value) {
            $string.=$key.':'.$value;
            $i++;
            if($i<$max){
                $string.='|';
            }       
        }

        return Crypt::encryptString($string);
    }

    public static function decrypt($string)
    {
        $string = Crypt::decryptString($string);
        return   Str::of($string)->explode('|')->map(function ($s) {
            $data = Str::of($s)->explode(':');
            return [$data[0] => $data[1]];
        })->collapseWithKeys();
    }
}
