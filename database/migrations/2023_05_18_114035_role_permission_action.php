<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permission_actions', function (Blueprint $table) {
            $table->id();

            $table->integer('role_id')->unsigned();
            $table->integer('permissions_id')->unsigned();
            $table->integer('action_id')->unsigned();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('permissions_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('action_id')->references('id')->on('actions')->onDelete('cascade');

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
        //
    }
};
