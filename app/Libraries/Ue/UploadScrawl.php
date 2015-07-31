<?php
namespace App\Libraries\Ue;

class UploadScrawl extends Upload
{
    public function __construct()
    {
        $CONFIG = config('ueupload');
        $this->config = array(
            "pathFormat" => $CONFIG['scrawlPathFormat'],
            "maxSize" => $CONFIG['scrawlMaxSize'],
            "allowFiles" => $CONFIG['scrawlAllowFiles'],
            "oriName" => "scrawl.png"
        );
        $this->fieldName = $CONFIG['scrawlFieldName'];
        $this->base64 = "base64";
    }

}
