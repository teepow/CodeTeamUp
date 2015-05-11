@extends('app')

@section('content')


	<h1 class="page-heading">Edit Profile</h1>

	{!! Form::open() !!}

		<div class="form-group">
			
			{!! Form::label('location') !!}
			{!! Form::text('location') !!}

		</div>

		<div class="form-group">
			
			{!! Form::label('website') !!}
			{!! Form::text('website') !!}

		</div>

		<div class="form-group">
			
			{!! Form::label('github') !!}
			{!! Form::text('github') !!}

		</div>

		<div class="form-group">
			
			{!! Form::label('age') !!}
			{!! Form::input('number', 'age', null, ['min' => '13', 'max' => '99']) !!}

		</div>

		<div class="form-group">
			
			<fieldset class="group"> 
				<legend>Select Languages to Partner up Using</legend> 

				@foreach($languages as $language)

					{!! Form::checkbox("$language", "$language") !!}
					{!! Form::label("$language") !!}		

				@endforeach

			</fieldset>

		</div>

		<div class="form-group">

			{!! Form::submit('Update', ['class' => 'btn btn-default form-control']) !!}

		</div>

	{!! Form::close() !!}

@stop