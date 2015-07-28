<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    protected $table = 'meta_admin';


    protected $guarded = ['id'];

    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\Model\Admin\User', 'id', 'admin_id');
    }

}