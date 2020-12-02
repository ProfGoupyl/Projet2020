<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyInvitations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('invitations', function (Blueprint $table) {
            $table->unsignedBigInteger('cours_id');
        
            $table->foreign('cours_id')->references('id')->on('cours')->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invitations', function (Blueprint $table) {

            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['user_id', 'cours_id']);
            $table->dropColumn(['user_id', 'cours_id']);
        });
    }
}
