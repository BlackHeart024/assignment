<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id('t_id');
            $table->string('t_name');
            $table->string('t_email')->unique;
            $table->integer('t_d_id');
            $table->foreign('t_d_id')->references('d_id')->on('department');
            $table->enum('t_gender',["M","F","O"]);
            $table->string('t_address');
            $table->string('t_password');	
            $table->date('dob');	
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
