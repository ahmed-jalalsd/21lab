<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slider_image')->nullable();
            $table->string('gallery_image')->nullable();
            $table->string('gallery_title')->nullable();
            $table->text('gallery_caption')->nullable();
            $table->string('slider_title')->nullable();
            $table->text('slider_caption')->nullable();
            $table->integer('content_id')->nullable()->unsigned();
            $table->integer('post_id')->nullable()->unsigned();
            $table->integer('download_id')->nullable()->unsigned();
            $table->integer('category_id')->nullable()->unsigned();
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
        Schema::dropIfExists('images');
    }
}
