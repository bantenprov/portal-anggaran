<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('anggarans', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('group_egovernment_id');
			$table->integer('sector_egovernment_id');
			$table->string('label')->nullable();
			$table->string('description')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::drop('anggarans');
	}
}
