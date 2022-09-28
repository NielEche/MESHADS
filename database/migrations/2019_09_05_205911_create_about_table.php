<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('brief');
            $table->text('primary_img_name')->nullable();
            $table->text('primary_img_url')->nullable();
            $table->text('secondary_img_name')->nullable();
            $table->text('secondary_img_url')->nullable();
            $table->text('quote')->nullable();
            $table->string('quote_author')->nullable();
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
        Schema::dropIfExists('about');
    }
}
