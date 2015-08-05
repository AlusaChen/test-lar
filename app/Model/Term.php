<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Term extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'terms';

    protected $guarded = ['id'];

    //protected $hidden = ['create_at', 'deleted_at'];

    /**
     * 获取指定类别
     * @param $type
     * @return mixed
     */
    public static function get_item_by_type($type)
    {
        return self::select('id', 'pid', 'cname')->where('type', $type)->get()->toArray();
    }
}
