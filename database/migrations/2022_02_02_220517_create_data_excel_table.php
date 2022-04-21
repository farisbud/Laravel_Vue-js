<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataExcelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_excel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('perusahaan_id');
            $table->string('judul');
            $table->string('url_excel');
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
        Schema::dropIfExists('data_excel');
    }
}
