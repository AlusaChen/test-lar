<?php

namespace App\Model\Admin;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use App\Model\MetaData;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    use MetaData;

    protected $meta_model = 'App\Model\Admin\UserMeta';

    protected $meta_id = 'admin_id';

    protected $local_id = 'id';


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'super_admin'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'deleted_at'];


    public function has_permission($perm)
    {
        if($this->super_admin) return true;
        $has_perms = $this->perm;
        if(!$has_perms) $has_perms = [];
        if(in_array($perm, $has_perms))
            return true;
        return false;
    }

    public function has_role($role)
    {
        return true;
    }

}
