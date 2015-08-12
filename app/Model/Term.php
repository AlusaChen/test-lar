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
     * @param int $top_id
     * @param int $bottom_id
     * @return array
     */
    public static function get_item_by_type($type, $top_id = 0, $bottom_id = -1)
    {
        if($type)
        {
            $terms =  self::where('type', $type)
                ->orderBy('id', 'desc')
                ->get()->toArray();
        }
        else
        {
            $terms =  self::orderBy('id', 'desc')
            ->get()->toArray();
        }

        $terms = array_assort($terms, 'id', 'pid', $top_id, $bottom_id);

        return $terms;
    }

    public static function get_all_permission($type = 'permission')
    {
        $permissions = self::select('id', 'name')
            ->where('type', $type)
            ->orderBy('id', 'desc')
            ->get()->toArray();

        $ids = array_column($permissions, 'id');
        $names = array_column($permissions, 'name');
        $permissions = array_combine($names, $ids);
        return $permissions;
    }

}
