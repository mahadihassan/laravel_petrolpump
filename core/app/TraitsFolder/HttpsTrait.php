<?php

namespace App\TraitsFolder;


trait HttpsTrait
{

    public static function updateHttps($status)
    {
        $path = base_path('.env');
        if (file_exists($path)) {

            if ($status == 'on'){
                // Default ENV False
                // Need ENV true
                file_put_contents($path, str_replace(
                    'APP_HTTPS=false', 'APP_HTTPS=true', file_get_contents($path)
                ));
            }elseif($status == null){
                // Default ENV True
                // Need ENV False
                file_put_contents($path, str_replace(
                    'APP_HTTPS=true', 'APP_HTTPS=false', file_get_contents($path)
                ));
            }
        }
    }

}