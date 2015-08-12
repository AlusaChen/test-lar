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

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admins';

    protected $meta_model = 'App\Model\Admin\UserMeta';

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

        return false;
    }

    public function has_role($role)
    {
        return true;
    }

    public function __get($key)
    {
        if(in_array($key, array_keys($this->attributes)))
        {
            return $this->attributes[$key];
        }
        else
        {
            if(!$this->meta_datas)
            {
                $this->meta_datas = $this->metadata();
            }
            if(array_key_exists($key, $this->meta_datas))
                return $this->meta_datas[$key];
            else
                return null;
        }
    }

}
