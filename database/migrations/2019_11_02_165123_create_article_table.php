<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('user_id');
            $table->integer('heading');
            $table->text('annotation');
            $table->text('body');
            $table->string('down_link');
            $table->boolean('published')->default(false);
            $table->string('slug');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('heading')->references('id')->on('headings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
