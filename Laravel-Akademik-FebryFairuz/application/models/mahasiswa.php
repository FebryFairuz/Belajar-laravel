<?php

class mahasiswa extends  Eloquent{
	public static $table = 'mahasiswas';
	public function nilai(){
		return has_many('nilai');
	}
}