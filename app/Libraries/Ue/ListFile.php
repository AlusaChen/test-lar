<?php
namespace App\Libraries\Ue;

class ListFile extends ListImages
{
    protected $path = '';

    protected $listSize = [];

    protected $allowFiles = [];

    public function __construct()
    {
        $CONFIG = config('ueupload');
        $this->allowFiles = $CONFIG['fileManagerAllowFiles'];
        $this->listSize = $CONFIG['fileManagerListSize'];
        $this->path = $CONFIG['fileManagerListPath'];
    }
}
