<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatejoblistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joblist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('buyer_uname');
            $table->string('buyer_email');
            $table->string('job_desc');
            $table->date('job_date');
            $table->double('salary',10,2);
            $table->string('freelancer_uname');
            // $table->timestamp('email_verified_at')->nullable();
           
          //  $table->rememberToken();
            //$table->timestamps();
        });

        Schema::table('joblist', function (Blueprint $table) {
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
