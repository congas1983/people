<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('city_id')->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('role_id')->index();
            $table->boolean('active')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('city_id')
            ->references('id')
            ->on('cities')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            $table->foreign('role_id')
            ->references('id')
            ->on('roles')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            


            //Nombres y apellidos, departamento, ciudad, correo, rol.
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
