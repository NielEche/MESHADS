<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesProvidedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_provided', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('title');
			$table->string('slug');
			$table->bigInteger('project_id')->unsigned();
			$table->boolean('is_visible')->default(false);
            $table->timestamps();

			$table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_provided');
    }
}
