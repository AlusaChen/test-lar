<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

use App\Model\MetaData;


class Post extends Model
{
    use MetaData;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    protected $meta_model = 'App\Model\Admin\PostMeta';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $guarded = ['id', 'email', 'password'];



}
