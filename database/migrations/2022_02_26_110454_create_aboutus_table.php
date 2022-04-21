<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Text('visi');
            $table->Text('misi');
            $table->longText('deskripsi');
            $table->string('nama');
            $table->string('alamat');
            $table->string('telp');
            $table->longText('riwayat');
            $table->string('pendidikan');
            $table->string('image');
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
        Schema::dropIfExists('about_us');
    }
}
