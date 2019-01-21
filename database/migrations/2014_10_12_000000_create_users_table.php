<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
<<<<<<< Updated upstream
            $table->integer('miles')->nullable();
            $table->string('rut')->nullable();
            $table->rememberToken();
=======
            $table->integer('miles');
            $table->string('rut');
            $table->rememberToken()->nullable();   //CAMBIE ESTO PARA UNA PRUEBA.
>>>>>>> Stashed changes
            $table->timestamps();

            $table->unsignedInteger('role_id')->default(4);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return vpopmail_del_domain(domain)
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
