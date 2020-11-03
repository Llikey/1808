<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_user_model extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'xm_admin_user';
    protected $primarykey = 'id';
    protected $fillable = ['user', 'pwd', 'typeid'];

    public $timestamps = false;

}
