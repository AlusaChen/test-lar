<?php
namespace App\Libraries\Ue;

class UploadImage extends Upload
{
    public function __construct($config)
    {
        parent::__construct($config);
        $this->config = array(
            "pathFormat" => $config['imagePathFormat'],
            "maxSize" => $config['imageMaxSize'],
            "allowFiles" => $config['imageAllowFiles']
        );
        $this->fieldName = $config['imageFieldName'];
    }

}
