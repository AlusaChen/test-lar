<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{

    protected $table = 'relations';

    public $timestamps = false;

    protected $fillable = ['object_id', 'term_id', 'order'];


    public function posts()
    {
        return $this->hasManyThrough('App\Model\Post', 'App\Model\Term', 'term_id', 'object_id');
    }
}
