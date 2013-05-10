<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table){
			$table->increments('id');
			$table->string('username',64);
			$table->string('password',64);
			$table->string('name',50);
		});
		//melakukan insert record
		DB::table('users')->insert(array(
			'username' => 'febry',
			'password' => Hash::make('gaga'),
			'name' => 'Febry Fairuz',
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}