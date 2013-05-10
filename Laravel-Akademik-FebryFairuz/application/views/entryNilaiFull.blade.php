@layout('templates.main')
@section('content')
	<section style="width:100%;">
		<center><h1>Laporan Penilaian</h1></center><hr>
		@if (Session::has('success_message'))
			<div class="alert">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Input berhasil</strong>
			</div>
		@elseif(Session::has('delete_message'))
			<div class="alert">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Hapus berhasil</strong>
			</div>
		@endif
		
		<aside style="float:right;margin-top:-10px">
		<h3>Daftar Nilai Mahasiswa</h3>
		<table style="width:800px" class="table table-striped">
			<tr class="info">
				<td>No</td>
				<td>NIM</td>
				<td>Nama</td>
				<td>Mata Kuliah</td>
				<td>Tahun</td>
				<td>Semester</td>
				<td>Huruf</td>
				<td>Aksi</td>
			</tr>
		{{Form::hidden($no=1)}}
		@foreach (nilai::all() as $nilai)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$nilai->nim}}</td>
				<td>{{$nilai->nama}}</td>
				<td>{{$nilai->matakuliah}}</td>
				<td>{{$nilai->tahun}}</td>
				<td>{{$nilai->semester}}</td>
				<td>{{$nilai->huruf}}</td>
				<td>
				{{Form::open('hapusNilai','delete')}}
					{{ Form::hidden('id',$nilai->id_nilai)}}
					{{ Form::submit('',array('class' => 'btn btn-warning'))->with_icon('trash') }}
				{{ Form::close() }}
				</td>
			</tr>
		@endforeach	
		</table>
		</aside>
		
		<aside>		
		<h3>Input Nilai Mahasiswa</h3>
		{{ Form::open('inputNilai') }}
		<?php if(!empty($dataNim)){ ?>
		{{ Form::text('nim', $dataNim, array('placeholder'=>'Nim'), 'required') }}<br>
		{{Form::hidden($nimc=Input::get('nim'))}}
		@foreach (mahasiswa::where('nim','=',$nimc)->get() as $cari)
			{{ Form::text('nama', $cari->nama, array('placeholder'=>'Nama'), 'required') }}<br>
		@endforeach
		
		<?php }else{ ?>
			{{ Form::text('nim', Input::old('nim'), array('placeholder'=>'Nim', 'required')) }}<br>		
			{{ Form::text('nama', Input::old('nama'),array('placeholder'=>'Nama', 'required')) }}<br>
		<?php } ?>		
		{{ Form::text('mk', Input::old('mk'),array('placeholder'=>'Mata Kuliah', 'required')) }}<br>
		{{ Form::text('thn', Input::old('thn'),array('placeholder'=>'Tahun', 'required')) }}<br>
		{{ Form::text('sms', Input::old('sms'),array('placeholder'=>'Semester', 'required')) }}<br>
		{{ Form::text('hrf', Input::old('hrf'),array('placeholder'=>'Huruf', 'required')) }}<br>
		{{ Form::submit('Simpan',array('class' => 'btn btn-success')) }}
		{{ Form::reset('Batal',array('class' => 'btn btn-success')) }}
		{{ Form::close() }}
		</aside>
		<hr>
	</section>
@endsection