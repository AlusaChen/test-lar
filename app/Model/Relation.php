<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{

    protected $table = 'relations';

    public $timestamps = false;

    protected $fillable = ['object_id', 'term_id', 'order'];

}
