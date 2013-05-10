@layout('templates.main')
@section('content')
	<div class="span10 offset1 well">
		<h1>Menu</h1>
		<hr>
		<ul class="nav nav-list">
			<li><a href="{{URL::to('MstMahasiswa')}}">Master Mahasiswa</a></li>
			<li><a href="{{URL::to('EntryNilai')}}">Entri Nilai</a></li>
		</ul>
	</div>
@endsection