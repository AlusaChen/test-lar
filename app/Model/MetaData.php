<?php
namespace App\Model;

/**
 * Class MetaData
 * @package App\Model
 * 使用时必须定义一个meta_model
 */
trait MetaData
{
    /**
     * 设置key - value 并返回 meta_model 对象
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set_value_by_key($key, $value)
    {
        return $this->hasOne($this->meta_model, 'admin_id', 'id')
            ->updateOrCreate(['mkey' => $key], ['mvalue' => $value]);
    }

    /**
     * 根据key 获取 meta_model 对象
     * @param $key
     * @return mixed
     */
    public function get_value_by_key($key)
    {
        return $this->hasOne($this->meta_model, 'admin_id', 'id')
            ->where('mkey', $key)
            ->first();
    }

    /**
     * 获取所有meta_data
     * @return mixed
     */
    public function metadata()
    {
        return $this->hasMany($this->meta_model, 'admin_id', 'id');
    }
}