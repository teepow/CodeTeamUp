@extends('app')

@section('content')

	<h1 class="page-heading">Edit Profile</h1>

	{!! Form::open(['action' => 'ProfilesController@store', 'files' => true]) !!}

		<div class="form-group">
			
			{!! Form::label('location', 'Location') !!}
			{!! Form::text('location', null, ['class' => 'form-control']) !!}

		</div>

		<div class="form-group">
			
			{!! Form::label('website', 'Website') !!} 
			{!! Form::text('website', null, ['class' => 'form-control']) !!} *Optional

		</div>

		<div class="form-group">
			
			{!! Form::label('github', 'Github') !!}
			{!! Form::text('github', null, ['class' => 'form-control']) !!} *Optional

		</div>

		<div class="form-group">
			
			{!! Form::label('age', 'Age') !!}
			{!! Form::input('number', 'age', null, ['min' => '13', 'max' => '99', 'class' => 'form-control']) !!}

		</div>

		<div class="form-group">
			{!! Form::label('bio', 'A little about you:') !!} 255 character max 
			{!! Form::textarea('bio', null, ['class' => 'form-control', 'maxlength' => '255']) !!} *Optional 
		</div>

		<div class="form-group">
			{!! Form::label('file', 'Add a Photo') !!}
			{!! Form::file('file') !!} *Optional
		</div>

		<div class="form-group">
			
			<fieldset class="group"> 
				<legend>Select Languages to Partner up Using</legend> 

				@foreach($languages as $language)

					{!! Form::label("$language", "$language") !!}	
					{!! Form::checkbox("languages[]", "$language", null, ['id' => "$language"]) !!}	

				@endforeach

			</fieldset>

		</div>

		<div class="form-group">

			{!! Form::submit('Update', ['class' => 'btn btn-default form-control']) !!}

		</div>

	{!! Form::close() !!}

	@include('errors.list')

@stop