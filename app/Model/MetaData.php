<?php
namespace App\Model;

/**
 * Class MetaData
 * @package App\Model
 * 使用时必须定义一个meta_model
 */
trait MetaData
{
    public $meta_datas = [];
    protected $init_meta = false;



    /**
     * 获取所有meta_data
     * @return mixed
     */
    public function metadata()
    {
        $datas =  $this->hasMany($this->meta_model, $this->meta_id, $this->local_id)->get();
        $ret = [];
        foreach($datas as $item)
        {
            $ret[$item->mkey] = unserialize($item->mvalue);
        }
        return $ret;
    }


    /**
     * 获取值，无则获取meta中对应mkey的值
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        $value = parent::__get($key);
        if(!$value && array_key_exists($this->local_id, $this->attributes))
        {
            if(!$this->init_meta)
            {
                $this->meta_datas = $this->metadata();
                $this->init_meta = true;
            }
            if(array_key_exists($key, $this->meta_datas))
                return $this->meta_datas[$key];
        }
        return $value;
    }

    /**
     * 设置key - value 并返回 meta_model 对象
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set_value_by_key($key, $value)
    {
        return $this->hasOne($this->meta_model, $this->meta_id, $this->local_id)
            ->updateOrCreate(['mkey' => $key], ['mvalue' => serialize($value)]);
    }

}
