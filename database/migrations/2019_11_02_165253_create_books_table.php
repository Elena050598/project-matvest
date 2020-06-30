<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->bigIncrements('id');
            $table->string('author');
            $table->integer('catalog');
            $table->text('description');
            $table->text('image');
            $table->string('download_link');
            $table->timestamps();
            $table->foreign('catalog')->references('id')->on('book_catalog');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
