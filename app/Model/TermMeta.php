<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TermMeta extends Model
{
    protected $table = 'meta_term';

    protected $guarded = ['id'];

    public $timestamps = false;

}