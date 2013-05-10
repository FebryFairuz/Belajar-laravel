<?php

class Create_Mahasiswa {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mahasiswa',function($table){
			//$table->increments('id');
			$table->increments('nim',10);
			$table->string('nama',50);
			$table->text('alamat');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mahasiswa');
	}

}