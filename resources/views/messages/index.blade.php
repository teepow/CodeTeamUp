@extends('app')

@section('content')

<ul>
	@foreach($messages as $message)
		<li>{{ $message->message . " " . $message->user_id . " " . $message->name }}</li>
	@endforeach
</ul>
@stop