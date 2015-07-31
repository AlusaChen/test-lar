<?php
namespace App\Libraries\Ue;

class Upload
{
    protected $fieldName;

    protected $config;

    protected $base64 = 'upload';

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

    public function do_handle()
    {
        $up = new Uploader($this->fieldName, $this->config, $this->base64);
        return json_encode($up->getFileInfo());
    }

}
