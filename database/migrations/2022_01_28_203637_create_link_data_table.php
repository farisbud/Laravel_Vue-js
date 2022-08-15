<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('perusahaan_id');
            $table->string('nama_url');
            $table->string('url');
           
            $table->timestamps();

            $table->index('perusahaan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('link_data');
    }
}
