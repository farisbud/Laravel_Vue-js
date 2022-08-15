<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kd_saham');
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_telp');
            $table->mediumText('description');
            $table->string('alamat_web');
            $table->date('tanggal');
            $table->string('papan');
            $table->string('bidang');
            $table->string('sector');
            $table->string('sub_sector');
            $table->string('industri');
            $table->string('sub_industri');
            $table->string('biro_administrasi');
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
        Schema::dropIfExists('perusahaan');
    }
}
