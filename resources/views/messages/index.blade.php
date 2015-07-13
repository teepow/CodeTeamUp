@extends('app')

@section('content')

	@foreach($messages as $message)
		<div class="panel panel-info">
			<div class="panel-heading">	
				<h3 class="panel-title">{{ $message->name }}</h3>
			</div>
			<div class="panel-body">
				{{ $message->message }}
				<a class="btn btn-primary" href="profiles/{{ $message->id }}">View Profile</a>
				<a class="btn btn-primary" href="messages/{{ $message->id }}/create">Send Message</a>
			</div>
		</div>
	@endforeach

@stop