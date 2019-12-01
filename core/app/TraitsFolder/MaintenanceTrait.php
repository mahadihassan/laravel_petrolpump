<?php

namespace App\TraitsFolder;


trait MaintenanceTrait
{

    public static function updateMaintenance($status)
    {
        $path = base_path('.env');
        if (file_exists($path)) {

            if ($status == 'on'){
                // Default ENV False
                // Need ENV true
                file_put_contents($path, str_replace(
                    'APP_MAINTENANCE=false', 'APP_MAINTENANCE=true', file_get_contents($path)
                ));
            }elseif($status == null){
                // Default ENV True
                // Need ENV False
                file_put_contents($path, str_replace(
                    'APP_MAINTENANCE=true', 'APP_MAINTENANCE=false', file_get_contents($path)
                ));
            }
        }
    }

}