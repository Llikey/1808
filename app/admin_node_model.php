<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_node_model extends Model
{
    protected $table = 'xm_admin_nodes';
    protected $primarykey = 'id';
    protected $fillable = ['nodename', 'parentid', 'module_name', 'is_menu'];

    public $timestamps = false;
}
