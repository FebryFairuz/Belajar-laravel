<?php

class nilai extends  Eloquent{
	  public static $table = 'nilais';
	  public function mahasiswa()
		{
			return $this->belongs_to('mahasiswas','nim');
		}
}