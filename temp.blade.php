  {!! Form::open(['data-remote', 'method' => 'PATCH', 'url' => 'profiles/' . $profile->id, 'files' => true]) !!}
    <div class="labels-group">

      <div class="form-group">
        
        {!! Form::label('location') !!}
        {!! Form::text('location', $profile->location) !!}

      </div>

      <div class="form-group">
        
        {!! Form::label('website') !!}
        {!! Form::text('website', $profile->website) !!}

      </div>

      <div class="form-group">
        
        {!! Form::label('github') !!}
        {!! Form::text('github', $profile->github) !!}

      </div>

      <div class="form-group">
        
        {!! Form::label('age') !!}
        {!! Form::input('number', 'age', $profile->age, ['min' => '13', 'max' => '99']) !!}

      </div>

    </div>

    <div class="form-group">
      {!! Form::label('A little about you:') !!} 255 character max 
      {!! Form::textarea('bio', $profile->bio, ['class' => 'form-control', 'maxlength' => '255']) !!} *Optional 
    </div>

    <div class="form-group">
      {!! Form::label('file', 'Add a Photo') !!}
      {!! Form::file('file') !!} *Optional
    </div>

    <div class="form-group">
      
      <fieldset class="group"> 
        <legend>Select Languages to Partner up Using</legend> 

        @foreach($allLanguages as $language)

          {!! Form::label("languages", "$language") !!} 
          {!! Form::checkbox("languages[]", "$language", in_array($language, $currentLanguages)) !!}

        @endforeach

      </fieldset>

    </div>

    <div class="form-group">

      {!! Form::submit('Update', ['class' => 'btn btn-default form-control']) !!}

    </div>

  {!! Form::close() !!}