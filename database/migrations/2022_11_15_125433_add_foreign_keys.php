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
        Schema::table('users', function(Blueprint $table){
           $table->foreignId('role_id')
                    ->references('id')
                    ->on('roles');
        });

        Schema::table('groups', function (Blueprint $table) {
            $table->foreignId('owner_id')
                    ->references('id')
                    ->on('users');
        });

        Schema::table('group_user', function (Blueprint $table) {
            $table->foreignId('group_id')
                ->references('id')
                ->on('groups');

            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::table('drawn', function (Blueprint $table) {
            $table->foreignId('group_id')
                ->references('id')
                ->on('groups');

            $table->foreignId('user_id')
                ->references('id')
                ->on('users');

            $table->foreignId('drawn_id')
                ->references('id')
                ->on('users');
        });

        Schema::table('wishlist', function (Blueprint $table) {
            $table->foreignId('group_id')
                ->references('id')
                ->on('groups');

            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->foreignId('wishlist_id')
                ->references('id')
                ->on('wishlist');
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
