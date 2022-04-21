<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sub_category_id');
            $table->string('caption');
            $table->text('judul');
            $table->mediumText('sub_content');
            $table->longText('description');
            $table->string('image_source')->nullable();
            $table->string('image');
            $table->timestamps();
            
            $table->index('sub_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content');
    }
}
