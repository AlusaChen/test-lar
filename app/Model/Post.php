<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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

}
