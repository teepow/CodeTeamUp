@extends('app')

@section('content')

	@if(isset($results))

		<div class="btn-group">
		  	<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Sort By<span class="caret"></span>
		  	</button>
		 	<ul class="dropdown-menu">
				<li><a href="{{ url('/matches') }}">By Language</a></li>
				<li><a href="{{ url('/matches/person') }}">By Person</a></li>
		  	</ul>
		</div>

		@foreach($results as $heading => $profiles)
			<div class="panel panel-default">
				<div class="panel-heading">{{ $heading . " Matches" }}</div>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th></th>
								<th>Name</th>
								<th>Website</th>
								<th>Github</th>
								<th>Languages</th>
								<th>Profile</th>
								<th>Message</th>
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
									<td><a class="btn btn-primary" href="{{ url("profiles/$profile->id") }}">View Profile</a></td>
									<td><a class="btn btn-success" href="{{ url("messages/$profile->id/create") }}">Send Message</a></td>

								</tr>
							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		@endforeach

	@else
		<div class="text-center">
			<h1>You Have No Matches</h1>
		</div>
	@endif


@stop