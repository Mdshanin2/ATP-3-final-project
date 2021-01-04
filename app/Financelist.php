<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financelist extends Model
{
    protected $table = 'finance';
	protected $primaryKey = "id";
	public $timestamps = false;

	//const CREATED_AT = "create_time";
	//const UPDATED_AT = "update_time";
    //
}
