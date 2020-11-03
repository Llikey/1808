<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usermodel extends Model
{
    protected $table='user';
	protected $primarykey='id';
	protected $fillable = ['name'];
	
	public $timestamps=false;
	
	
	public function ddd()
	{
		return $this->belongsToMany('\App\rolemodel','role_user','role_id','user_id');
	}
}
