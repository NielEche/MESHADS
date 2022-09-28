<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_data', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('short_name')->nullable();
			$table->string('full_name')->nullable();
			$table->text('logo_name')->nullable();
			$table->text('logo_url')->nullable();
			$table->text('logo_white_name')->nullable();
			$table->text('logo_white_url')->nullable();
			$table->text('brochure_name')->nullable();
			$table->text('brochure_url')->nullable();
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
        Schema::dropIfExists('basic_data');
    }
}
