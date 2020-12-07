<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_cours', function (Blueprint $table) {
            $table->id();
            $table->date('start_at');
            $table->date('end_at');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('cours_id');
            $table->foreign('cours_id')->references('id')->on('cours')->onDelete('cascade');
            $table->timestamps();
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

        // Schema::table('users_cours', function (Blueprint $table) {
        //     Schema::disableForeignKeyConstraints();
        //     $table->dropForeign(['user_id', 'cours_id']);
        //     $table->dropColumn(['user_id', 'cours_id']);
        // });

        Schema::dropIfExists('users_cours');
    }
}
