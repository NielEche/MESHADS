<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('title');
			$table->string('caption')->nullable();
			$table->text('slug');
			$table->bigInteger('category_id')->unsigned();
			$table->boolean('is_visible')->default(false);
			$table->text('cover_image_name')->nullable();
            $table->text('cover_image_url')->nullable();
            $table->text('alt_cover_image_name')->nullable();
            $table->text('alt_cover_image_url')->nullable();
			$table->string('client_name');
			$table->text('quote')->nullable();
			$table->string('quote_author')->nullable();
			$table->text('project_brief');
			$table->text('project_video_url')->nullable();
            $table->timestamps();

			$table->foreign('category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('projects');
    }
}
