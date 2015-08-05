<?php
namespace App\Libraries;

class Editor
{
    protected $editor = '';

    protected $drivers = [];

    public function __construct($editor)
    {
        $this->editor = $editor;
    }

    /**
     * 默认编辑器
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->editor;
    }

    /**
     * 创建编辑器实例
     * @param $driver
     * @return mixed
     */
    protected function createDriver($driver)
    {
        $driver = __NAMESPACE__.'\\'.ucfirst($driver).'Editor';

        return new $driver;
    }

    /**
     * 获取编辑器
     * @param null $driver
     * @return mixed
     */
    public function driver($driver = null)
    {
        $driver = $driver ?: $this->getDefaultDriver();
        if (!isset($this->drivers[$driver])) {
            $this->drivers[$driver] = $this->createDriver($driver);
        }

        return $this->drivers[$driver];
    }

    /**
     * 调用编辑器 do_handle
     * @param $method
     * @param $parameters 0 = driver
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->driver(), $method], $parameters);
    }
}