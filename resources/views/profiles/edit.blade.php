@extends('app')

@section('content')

  <h1 class="page-header">Edit Profile</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
      	{!! HTML::image("$profile->image", null, ['class' => 'avatar img-circle img-thumbnail', 'alt' => 'profile-pic']) !!}
     
        <h6>Upload a different photo...</h6>

		{!! Form::open(['data-remote', 'method' => 'PATCH', 'url' => 'profiles/' . $profile->id . '/image', 'files' => true, 'class' => 'form-horizontal image-form', 'role' => 'form']) !!}
			{!! Form::file('file', ['class' => 'center-block text-center well well-sm']) !!}
			{!! Form::submit('Save Image', ['class' => 'btn btn-primary']) !!}
		{!! Form::close() !!}

      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      @include('errors.list')
      <h3>Personal info</h3>

      {!! Form::open(['data-remote', 'method' => 'PATCH', 'url' => 'profiles/' . $profile->id, 'files' => true, 'class' => 'form-horizontal', 'role' => 'form']) !!}

        <div class="form-group">

          {!! Form::label('occupation', null, ['class' => 'col-lg-3 control-label']) !!}

          <div class="col-lg-8">

            {!! Form::text('occupation', $profile->occupation, ['class' => 'form-control']) !!}

          </div>
        </div>

        <div class="form-group">

          {!! Form::label('location', null, ['class' => 'col-lg-3 control-label']) !!}

          <div class="col-lg-8">

            {!! Form::text('location', $profile->location, ['class' => 'form-control']) !!}

          </div>
        </div>
        <div class="form-group">
        
          {!! Form::label('website', null, ['class' => 'col-lg-3 control-label']) !!}
          
          <div class="col-lg-8">

            {!! Form::text('website', $profile->website, ['class' => 'form-control']) !!} *optional

          </div>
        </div>
        <div class="form-group">
        
          {!! Form::label('github', null, ['class' => 'col-lg-3 control-label']) !!}
          
          <div class="col-lg-8">
          {!! Form::text('github', $profile->github, ['class' => 'form-control']) !!} *optional
            
          </div>
        </div>
        <div class="form-group">
        
        {!! Form::label('age', null, ['class' => 'col-lg-3 control-label']) !!}
          
          <div class="col-lg-8">

            {!! Form::input('number', 'age', $profile->age, ['min' => '13', 'max' => '99', 'class' => 'form-control', 'id' => 'user_time_zone']) !!}

          </div>
        </div>
        <div class="form-group">

          {!! Form::label('A little about you:', null, ['class' => 'col-md-3 control-label']) !!}
          
          <div class="col-md-8">

            {!! Form::textarea('bio', $profile->bio, ['class' => 'form-control', 'maxlength' => '255']) !!}            
          </div>
        </div>
        <div class="form-group">
      
      <fieldset class="group"> 
        <legend>Select Languages to Partner up Using</legend> 

        @foreach($allLanguages as $language)

          {!! Form::label("languages", "$language") !!} 
          {!! Form::checkbox("languages[]", "$language", in_array($language, $currentLanguages)) !!}

        @endforeach

      </fieldset>{{-- 
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div> --}}
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">

  			{!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}

            <span></span>
  			{!! Form::reset('Cancel', ['class' => 'btn btn-default']) !!}	            
            
          </div>
        </div>
      
      {!! Form::close() !!}
      
    </div>
  </div>

@stop





