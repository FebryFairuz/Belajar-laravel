@layout('templates.main')
@section('content')	
	<section style="width:100%;">	
		<center><h1>Master Mahasiswa</h1></center><hr>
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
		<h3>Daftar Mahasiswa</h3>
		<table style="width:900px" class="table table-striped">
			<tr class="info">
				<td>No</td>
				<td>NIM</td>
				<td>NAMA</td>
				<td>ALAMAT</td>
				<td>Aksi</td>
			</tr>
			{{Form::hidden($no=1)}}
			@foreach ($data as $mhs)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$mhs->nim}}</td>
					<td>{{$mhs->nama}}</td>
					<td>{{$mhs->alamat}}</td>
					<td>
					{{Form::open('hapusMhs','delete')}}
						{{ Form::hidden('nim',$mhs->nim)}}
						{{ Form::submit('',array('class' => 'btn btn-warning'))->with_icon('trash') }}
					{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</table>
		</aside>
		
		<aside>
			<h3>Form Mahasiswa</h3>
			{{ Form::open('inputMhs') }}
			{{ Form::text('nim', Input::old('nim'),array('placeholder'=>'Nim', 'required'))}}<br>
			{{ Form::text('nama',  Input::old('nama'),array('placeholder'=>'Nama', 'required')) }}<br>			{{ Form::textarea('alamat',  Input::old('alamat'),array('placeholder'=>'Alamat', 'required')) }}<br>
			{{ Form::submit('Simpan',array('class' => 'btn btn-success')) }}
			{{ Form::reset('Batal',array('class' => 'btn btn-success')) }}
			{{ Form::close() }}	
		</aside>
		<hr>
	</section>
@endsection