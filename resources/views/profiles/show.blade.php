@extends('app')

@section('content')

	@if(Session::has('flash_message'))
		<div class="alert alert-success">
			{{ Session::get('flash_message') }}
		</div>
	@endif

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

			<h1 class="page-heading">{{ $name }}</h1>
			<a class="btn btn-lg btn-primary" href="/messages/{{ $profileId }}/create">Send Message</a>

		</div>
		<div class="jumbotron">
			<p class="well well-lg">{{ $bio }}</p>
		</div>
	</div>

	<script src="//code.jquery.com/jquery.js"></script>
	<script>
		$('div.alert').delay(3000).slideUp(300);
	</script>

@stop