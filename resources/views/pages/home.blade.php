@extends('app')

@section('content')
	
	<h1 class="page-heading">
		Hello, {{ $name }}
	</h1>

	<div class="col-md-3">
		{!! HTML::image("$image", null, ['class' => 'img-responsive']) !!}
		<ul>
			<li>{{ $age }}</li>
			<li>{{ $location }}</li>
			<li><a href="{{ $website }}" target="_blank">{{ $website }}</a></li>
			<li><a href="{{ $github }}" target="_blank">{{ $github }}</a></li>
		</ul>
	</div>

	<div class="col-md-6">
		<p>{{ $bio }}</p>
		<ul class="list-inline">
			
			@foreach($languageNames as $name)
				<li>{{ $name }}</li>
			@endforeach

		</ul>
	</div>

@stop