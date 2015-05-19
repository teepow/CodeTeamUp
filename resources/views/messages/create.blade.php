@extends('app')

@section('content')


	<h1 class="page-heading">Create Message for {{ $name }} </h1>

	{!! Form::open(['action' => 'MessagesController@store']) !!}
	{!! Form::hidden('receiver_id', $profileId) !!}

		<div class="form-group">

			{!! Form::textarea('message', null, ['class' => 'form-control']) !!}

		</div>

		<div class="form-group">
			{!! Form::submit('Send Message', ['class' => 'btn btn-default form-control']) !!}
		</div>

	{!! Form::close() !!}

@stop