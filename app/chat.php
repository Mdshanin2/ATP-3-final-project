<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
   	protected $table = 'chat';
	protected $primaryKey = "id_chat";
	public $timestamps = false;

	//const CREATED_AT = "create_time";
	//const UPDATED_AT = "update_time";
}
