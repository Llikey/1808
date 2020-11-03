<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rolemodel extends Model
{
    protected $table='role';
	protected $primarykey='id';
	protected $fillable = ['name'];
	
	public $timestamps=false;

}
