<?php
namespace App\Libraries\Ue;

class UploadFile extends Upload
{
    public function __construct()
    {
        $CONFIG = config('ueupload');
        $this->config = array(
            "pathFormat" => $CONFIG['filePathFormat'],
            "maxSize" => $CONFIG['fileMaxSize'],
            "allowFiles" => $CONFIG['fileAllowFiles']
        );
        $this->fieldName = $CONFIG['fileFieldName'];
    }

}
