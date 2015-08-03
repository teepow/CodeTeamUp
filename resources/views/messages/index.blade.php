@extends('app')

@section('content')

	@if($messages)
		@foreach($messages as $message)
			<div class="panel panel-info">
				<div class="panel-heading">	
					<h3 class="panel-title">{{ $message->name }}</h3>

					{!! Form::open(['data-remote', 'method' => 'PATCH', 'url' => 'messages/' . $message->messageId]) !!}

						<div class="form-group">
							{!! Form::submit('Mark as Read', ['class' => 'btn btn-danger mark-as-read-button']) !!}
						</div>

					{!! Form::close() !!}
					
				</div>
				<div class="panel-body">
					{{ $message->message }}
					<a class="btn btn-primary" href="profiles/{{ $message->profileId }}">View Profile</a>
					<a class="btn btn-success" href="messages/{{ $message->profileId }}/create">Send Message</a>
				</div>
			</div>
		@endforeach
	@else
		<div class="text-center">
			<h1>Nobody Loves You</h1>
		</div>
	@endif

@stop