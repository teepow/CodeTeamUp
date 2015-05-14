@extends('app')

@section('content')

@foreach($results as $language => $profiles)
	<h1>{{ $language . " Matches" }}</h1>
	<hr>
	@foreach($profiles as $profile)
		<ul class="list-inline">
			<li>
				{{ $profile->user->name }}
			</li>
			<li>
				{!! HTML::image("$profile->image", null, ['class' => 'img-responsive', 'width' => '20', 'height' => "20"]) !!}			
			</li>
			<li>
				<a href="{{ $profile->website }}" target="_blank">{{ $profile->website }}</a>
			</li>
			<li>
				<a href="{{ $profile->github }}" target="_blank">{{ $profile->github }}</a>
			</li>
			<li>
				{{ implode($profile->languages->lists('name'), ", ") }}
			</li>
			<li>
				<a href="profiles/{{ $profile->id }}">View Profile</a>
			</li>
		</ul>
	@endforeach
@endforeach

@stop