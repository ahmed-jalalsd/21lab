<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('download-media');
            $table->timestamps();
        });
        Schema::create('category_download', function (Blueprint $table) {
            $table->integer('download_id')->unsigned();
            $table->integer('category_id')->unsigned();

            //  $table->foreign('download_id')->references('id')->on('downloads')->onDelete('cascade');
            //  $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->primary(['category_id', 'download_id']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_download');
        Schema::dropIfExists('downloads');
    }
}
