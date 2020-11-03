<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_role_model extends Model
{
    protected $table = 'xm_admin_role';
    protected $primarykey = 'id';
    protected $fillable = ['rolename', 'rule'];

    public $timestamps = false;
}
