<?php
namespace App\Libraries\Ue;

class UploadFile extends Upload
{
    public function __construct($config)
    {
        parent::__construct($config);
        $this->config = array(
            "pathFormat" => $config['filePathFormat'],
            "maxSize" => $config['fileMaxSize'],
            "allowFiles" => $config['fileAllowFiles']
        );
        $this->fieldName = $config['fileFieldName'];
    }

}
