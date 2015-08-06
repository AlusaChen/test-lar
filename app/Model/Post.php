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

    public function get_tags()
    {
        return DB::table('terms')
            ->leftJoin('relations', 'terms.id', '=', 'relations.term_id')
            ->where('relations.object_id', $this->id)
            ->where('terms.type', 'tag')
            ->get();
    }

    public function get_categories()
    {
        return DB::table('terms')
            ->leftJoin('relations', 'terms.id', '=', 'relations.term_id')
            ->where('relations.object_id', $this->id)
            ->where('terms.type', 'category')
            ->get();
    }


}
