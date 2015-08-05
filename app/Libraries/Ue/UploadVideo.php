<?php
namespace App\Libraries\Ue;

class UploadVideo extends Upload
{
    public function __construct($config)
    {
        parent::__construct($config);
        $this->config = array(
            "pathFormat" => $config['videoPathFormat'],
            "maxSize" => $config['videoMaxSize'],
            "allowFiles" => $config['videoAllowFiles']
        );
        $this->fieldName = $config['videoFieldName'];
    }

}
