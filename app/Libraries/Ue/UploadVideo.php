<?php
namespace App\Libraries\Ue;

class UploadVideo extends Upload
{
    public function __construct()
    {
        $CONFIG = config('ueupload');
        $this->config = array(
            "pathFormat" => $CONFIG['videoPathFormat'],
            "maxSize" => $CONFIG['videoMaxSize'],
            "allowFiles" => $CONFIG['videoAllowFiles']
        );
        $this->fieldName = $CONFIG['videoFieldName'];
    }

}
