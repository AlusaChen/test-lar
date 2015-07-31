<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    protected $table = 'meta_post';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\Model\Admin\User', 'id', 'post_id');
    }

}