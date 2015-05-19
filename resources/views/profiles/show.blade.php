@extends('app')

@section('content')

@if(Session::has('flash_message'))
	<div class="alert alert-success">
		{{ Session::get('flash_message') }}
	</div>
@endif

<h1 class="page-heading">{{ $name }}</h1>

<a class="btn btn-default btn-sm btn-primary" href="/messages/{{ $profileId }}/create">Send Message</a>

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

<script src="//code.jquery.com/jquery.js"></script>
<script>
	$('div.alert').delay(3000).slideUp(300);
</script>

@stop