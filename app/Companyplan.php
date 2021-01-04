<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companyplan extends Model
{
    protected $table = 'company_plan';
	protected $primaryKey = "id";
	public $timestamps = false;

	//const CREATED_AT = "create_time";
	//const UPDATED_AT = "update_time";
    //
}
