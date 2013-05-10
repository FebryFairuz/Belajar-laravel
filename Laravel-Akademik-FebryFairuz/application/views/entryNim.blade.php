@layout('templates.main')
@section('content')
	<h1>Masukan NIM</h1><hr>
	{{ Form::inline_open('inputNim') }}
	{{ Form::text('nim', Input::old('nim'),array('placeholder'=>'451xxxxxxx')) }}
	{{Button::info_submit('')->with_icon('search')}}
	{{ Form::close() }}
	<hr>
@endsection