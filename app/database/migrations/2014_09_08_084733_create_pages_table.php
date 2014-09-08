<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function(Blueprint $table) {
            $table->increments('id');
			$table->text('name');
			$table->text('type');
			$table->text('slug')->unique();
			$table->text('content');
			$table->text('title_tag');
			$table->text('meta_keyword');
			$table->text('meta_desc');
			$table->tinyInteger('status');
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
        Schema::drop('pages');
    }

}
