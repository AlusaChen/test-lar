<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'terms';

    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * 获取指定类别
     * @param $type
     * @return mixed
     */
    public static function get_item_by_type($type)
    {
        if($type)
        {
            return self::where('type', $type)
                ->orderBy('id', 'desc')
                ->get()->toArray();
        }
        else
        {
            return self::orderBy('id', 'desc')
            ->get()->toArray();
        }

    }
}
