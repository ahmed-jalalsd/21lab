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
            $table->increments('id');
            $table->integer('download_id')->unsigned();
            $table->integer('category_id')->unsigned();

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
        Schema::dropIfExists('downloads');
        Schema::dropIfExists('category_download');
    }
}
