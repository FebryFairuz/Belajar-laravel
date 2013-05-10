<?php
 
// awal halaman
Route::get('/', function() {    
    return View::make('menu');
});

/*proses menu*/
	Route::get('MstMahasiswa',function(){
		$mhs = mahasiswa::all();
		return View::make('masterMahasiswa',array('data' => $mhs));
	});
	
	Route::get('EntryNilai',function(){
		return View::make('entryNim');
	});

/*end proses menu*/

/*proses MAHASISWA*/
	/*proses input mahasiswa*/
	Route::post('inputMhs',function(){
		$nim = Input::get('nim');
		$nama = Input::get('nama');
		$alamat = Input::get('alamat');
		
		$id = DB::table('mahasiswas')->insert_get_id(
			array(
					'nim'	=> $nim,
					'nama'	=> $nama,
					'alamat'=> $alamat
			)
		);
		if($id == NULL){
			return Redirect::to('MstMahasiswa')
					->with('success_message', true);;
		}else{
			return View::make('index');
		}		
	});	
	/*end proses input mahasiswa*/
	
	/*proses Delete mahasiswa*/
	Route::delete('hapusMhs', function(){
		$nim = Input::get('nim');		
		mahasiswa::where('nim','=',$nim)->delete();
		return Redirect::to('MstMahasiswa')
				->with('delete_message', true);
	});
	/*end proses input mahasiswa*/	
/*end proses MAHASISWA*/


/*Proses Entri Nilai*/
	/*proses input nim*/
	Route::get('inputNim',function(){
		return View::make('entryNilaiFull');
	});
	Route::post('inputNim',function(){
		$nimC=Input::get('nim');		
		return View::make('entryNilaiFull', array('dataNim'=>$nimC));
	});
	/*end proses input nim*/

	/*proses input nilai*/
	Route::get('inputNilai',function(){
		return View::make('entryNilaiFull');
	});
	Route::post('inputNilai', function(){
		$nim = Input::get('nim');
		$nama = Input::get('nama');
		$mk  = Input::get('mk');
		$thn = Input::get('thn');
		$sms = Input::get('sms');
		$hrf = Input::get('hrf');
		
		$nilai = DB::table('nilais')->insert_get_id(
			array(
					'nim'			=> $nim,
					'nama'			=> $nama,
					'matakuliah'	=> $mk,
					'tahun'			=> $thn,
					'semester'		=> $sms,
					'huruf'			=> $hrf					
			)
		);
		if($nilai == NULL){
			return View::make('index');
		}else{
			return Redirect::to('inputNilai')->with('success_message', true);
		}	
	});
	/*end proses input nilai*/
	
	/*proses hapus nilai mahasiswa*/
	Route::delete('hapusNilai', function(){
		$id = Input::get('id');		
		nilai::where('id_nilai','=',$id)->delete();
		return Redirect::to('inputNim')->with('delete_message', true);
	});
	/*end proses hapus nilai mahasiswa*/
	
/*end proses Entri Nilai*/




 
 
/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/
 
Event::listen('404', function()
{
    return Response::error('404');
});
 
Event::listen('500', function()
{
    return Response::error('500');
});
 
/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|       Route::filter('filter', function()
|       {
|           return 'Filtered!';
|       });
|
| Next, attach the filter to a route:
|
|       Router::register('GET /', array('before' => 'filter', function()
|       {
|           return 'Hello World!';
|       }));
|
*/
 
Route::filter('before', function()
{
    // Do stuff before every request to your application...
});
 
Route::filter('after', function($response)
{
    // Do stuff after every request to your application...
});
 
Route::filter('csrf', function()
{
    if (Request::forged()) return Response::error('500');
});
 
Route::filter('auth', function()
{
    if (Auth::inputMhs()) return Redirect::to('login');
});