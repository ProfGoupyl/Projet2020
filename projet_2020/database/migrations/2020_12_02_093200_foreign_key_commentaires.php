<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyCommentaires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('commentaires', function (Blueprint $table) {
            $table->unsignedBigInteger('module_id')->nullable();
        
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });

        Schema::table('commentaires', function (Blueprint $table) {
            $table->unsignedBigInteger('cours_id')->nullable();
        
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

        Schema::table('commentaires', function (Blueprint $table) {

            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['user_id', 'module_id', 'cours_id']);
            $table->dropColumn(['user_id', 'module_id', 'cours_id']);
        });


    }
}
