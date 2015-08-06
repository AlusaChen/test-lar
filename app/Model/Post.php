<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use MetaData;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    protected $meta_model = 'App\Model\PostMeta';

    //不允许操作的字段
    protected $guarded = ['id'];


    public function save_relations($terms)
    {
        $this->relations()->delete();
        $relations = [];
        if($terms) foreach($terms as $term)
        {
            $relations[] = [
                'object_id' => $this->id,
                'term_id' => $term['term_id']
            ];
        }
        if($relations) $this->relations()->insert($relations);
    }

    public function relations()
    {
        return $this->hasMany('App\Model\Relation', 'object_id', 'id');
    }

    //分页
    public static function list_paginate($term_id = 0, $term_type = 'category', $per_page = 2)
    {
        if($term_id)
        {
            $terms = Term::get_item_by_type($term_type, $term_id);
            $category_ids = array_column($terms, 'id');
            $category_ids[] = $term_id;

            $posts = Post::leftJoin('relations', 'posts.id', '=', 'relations.object_id')
                ->whereIn('relations.term_id', $category_ids)
                ->orderBy('id', 'desc')->paginate($per_page);
        }
        else
        {
            $posts = Post::orderBy('id', 'desc')->paginate($per_page);
        }

        return $posts;
    }

    //获取对应标签
    public function get_tags()
    {
        return DB::table('terms')
            ->leftJoin('relations', 'terms.id', '=', 'relations.term_id')
            ->where('relations.object_id', $this->id)
            ->where('terms.type', 'tag')
            ->get();
    }



}
