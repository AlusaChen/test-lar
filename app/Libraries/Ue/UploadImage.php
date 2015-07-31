<?php
namespace App\Libraries\Ue;

class UploadImage extends Upload
{
    public function __construct()
    {
        $CONFIG = config('ueupload');
        $this->config = array(
            "pathFormat" => $CONFIG['imagePathFormat'],
            "maxSize" => $CONFIG['imageMaxSize'],
            "allowFiles" => $CONFIG['imageAllowFiles']
        );
        $this->fieldName = $CONFIG['imageFieldName'];
    }

}
