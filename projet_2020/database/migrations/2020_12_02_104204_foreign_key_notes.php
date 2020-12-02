<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('notes', function (Blueprint $table) {
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
        Schema::table('notes', function (Blueprint $table) {

            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['user_id', 'cours_id']);
            $table->dropColumn(['user_id', 'cours_id']);
        });
    }
}
