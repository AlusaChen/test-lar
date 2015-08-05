<?php
namespace App\Libraries\Ue;

class ListFile extends ListImages
{
    protected $path = '';

    protected $listSize = [];

    protected $allowFiles = [];

    public function __construct($config)
    {
        parent::__construct($config);
        $this->allowFiles = $config['fileManagerAllowFiles'];
        $this->listSize = $config['fileManagerListSize'];
        $this->path = $config['fileManagerListPath'];
    }
}
