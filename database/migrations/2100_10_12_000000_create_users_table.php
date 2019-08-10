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
            $table->bigIncrements('id');

            $table->string('username');
            $table->string('first_name');
            $table->string('surname');
            $table->bigInteger('role_id')->unsigned();
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->string('password');
            $table->rememberToken();
            
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')
                  ->references('id')
                  ->on('roles')
                  ->onDelete('cascade');

            $table->foreign('group_id')
                  ->references('id')
                  ->on('groups')
                  ->onDelete('set null');

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
