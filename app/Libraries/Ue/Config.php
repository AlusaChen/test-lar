<?php

namespace App\Libraries\Ue;

class Config
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function do_handle()
    {
        return json_encode($this->config);
    }
}