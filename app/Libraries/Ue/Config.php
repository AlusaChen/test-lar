<?php

namespace App\Libraries\Ue;

class Config
{
    public function do_handle()
    {
        return json_encode(config('ueupload'));
    }
}