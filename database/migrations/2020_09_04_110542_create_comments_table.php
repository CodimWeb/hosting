<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('hosting_id');
            $table->text('text');
            $table->string('email', 100);
            $table->string('user_name', 40);
            $table->string('user_position', 100);
            $table->float('usability');
            $table->float('satisfaction');
            $table->float('money');
            $table->float('quality');
            $table->float('totalRating');
            $table->boolean('moderation');
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
        Schema::dropIfExists('comments');
    }
}
