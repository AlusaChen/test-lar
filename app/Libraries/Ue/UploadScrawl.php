<?php
namespace App\Libraries\Ue;

class UploadScrawl extends Upload
{
    public function __construct($config)
    {
        parent::__construct($config);
        $this->config = array(
            "pathFormat" => $config['scrawlPathFormat'],
            "maxSize" => $config['scrawlMaxSize'],
            "allowFiles" => $config['scrawlAllowFiles'],
            "oriName" => "scrawl.png"
        );
        $this->fieldName = $config['scrawlFieldName'];
        $this->base64 = "base64";
    }

}
