<?php
namespace App\Libraries\Ue;

class Upload
{
    protected $fieldName;

    protected $config;

    protected $base64 = 'upload';

    public function __construct($config)
    {
        $this->config = array(
            "pathFormat" => $config['filePathFormat'],
            "maxSize" => $config['fileMaxSize'],
            "allowFiles" => $config['fileAllowFiles']
        );
        $this->fieldName = $config['fileFieldName'];
    }

    public function do_handle()
    {
        $up = new Uploader($this->fieldName, $this->config, $this->base64);
        return json_encode($up->getFileInfo());
    }

}
