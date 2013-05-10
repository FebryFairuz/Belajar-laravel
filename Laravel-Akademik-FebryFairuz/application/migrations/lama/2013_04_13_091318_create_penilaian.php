<?php

class Create_Penilaian {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('penilaian',function($table){
			$table->increments('id');
			$table->string('nim',10);
			$table->string('tahun',4);
			$table->string('semester',10);
			$table->string('huruf',2);
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('penilaian');
	}

}