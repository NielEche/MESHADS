<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_testimonials', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('testimonial');
			$table->string('author');
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
        Schema::dropIfExists('project_testimonials');
    }
}
