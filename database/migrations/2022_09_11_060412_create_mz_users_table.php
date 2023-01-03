<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMzUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('mz_users', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id', true);
            $table->string('pid');
            $table->bigInteger('role_id')->unsigned()->index(); // this is working
            $table->bigInteger('speciality_id')->unsigned()->index(); // this is working
            $table->bigInteger('clinic_id')->unsigned()->index(); // this is working
            $table->string('login')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->default('-');
            $table->string('password');
            $table->boolean('hide')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('mz_users', function ($table) {
            $table->foreign('role_id')->references('id')->on('mz_roles');
            $table->foreign('speciality_id')->references('id')->on('mz_specialties');
            $table->foreign('clinic_id')->references('id')->on('mz_clinics');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mz_users');
    }
}
