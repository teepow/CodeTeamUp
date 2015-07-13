@extends('app')

@section('content')

	<div class="col-md-3">
		{!! HTML::image("$image", null, ['class' => 'img-responsive']) !!}
		<ul class="home-list">
			<li>{{ $age }}</li>
			<li>{{ $location }}</li>
			<li><a href="{{ $website }}" target="_blank">{{ $website }}</a></li>
			<li><a href="{{ $github }}" target="_blank">{{ $github }}</a></li>
			<li>		
				<h2>Languages</h2>
				<ul class="list-inline">
			
					@foreach($languageNames as $languageName)
						<li>{{ $languageName }}</li>
					@endforeach

				</ul>
			</li>
		</ul>
	</div>

	<div class="col-md-6">
		<div class="jumbotron">

			<h1 class="page-heading">Hello, {{ $name }}</h1>
	
		</div>
		<div class="jumbotron">
			<p class="well well-lg">{{ $bio }}</p>
		</div>
	</div>

@stop