@extends('app')

@section('content')

@foreach($results as $language => $profiles)
	<div class="panel panel-default">
		<div class="panel-heading">{{ $language . " Matches" }}</div>
		<table class="table">
			<thead>
				<tr>
					<th></th>
					<th>Name</th>
					<th>Website</th>
					<th>Github</th>
					<th>Languages</th>
					<th>Profile</th>
				</tr>
			</thead>
			<tbody>
				
				@foreach($profiles as $profile)
					<tr>

						<td>{!! HTML::image("$profile->image", null, ['class' => 'img-responsive', 'width' => '20', 'height' => "20"]) !!}</td>	
						<td>{{ $profile->user->name }}</td>
						<td><a href="{{ $profile->website }}" target="_blank">{{ $profile->website }}</a></td>
						<td><a href="{{ $profile->github }}" target="_blank">{{ $profile->github }}</a></td>
						<td>{{ implode($profile->languages->lists('name'), ", ") }}</td>
						<td><a class="btn btn-primary" href="profiles/{{ $profile->id }}">View Profile</a></td>

					</tr>
				@endforeach

			</tbody>
		</table>
	</div>
@endforeach

@stop