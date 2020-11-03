<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roleusermodel extends Model
{
    protected $table='role_user';
	protected $primarykey='';
	protected $fillable = ['role_id','user_id'];
	
	public $timestamps=false;

}
