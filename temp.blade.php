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









<div class="row profile">
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">{{ $name }}</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
          
          <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
            <dl>
              <dt>DEPARTMENT:</dt>
              <dd>Administrator</dd>
              <dt>HIRE DATE</dt>
              <dd>11/12/2013</dd>
              <dt>DATE OF BIRTH</dt>
                 <dd>11/12/2013</dd>
              <dt>GENDER</dt>
              <dd>Male</dd>
            </dl>
          </div>-->
          <div class=" col-md-9 col-lg-9 "> 
            <table class="table table-user-information">
              <tbody>
                <tr>
                  <td>Department:</td>
                  <td>Programming</td>
                </tr>
                <tr>
                  <td>Location</td>
                  <td>{{ $location }}</td>
                </tr>
                <tr>
                  <td>Website</td>
                  <td><a href="{{ $website }}" target="_blank">{{ $website }}</a></td>
                </tr>
             
                   <tr>
                       <tr>
                  <td>Github</td>
                  <td><a href="{{ $github }}" target="_blank">{{ $github }}</a></td>
                </tr>
                  <tr>
                  <td>Home Address</td>
                  <td>Metro Manila,Philippines</td>
                </tr>
                <tr>
                  <td>About</td>
                  <td>{{ $bio }}</td>
                </tr>
                  <td>Languages</td>
                  <td>
      
                    @foreach($languageNames as $languageName)
                      {{ $languageName }}
                    @endforeach

                  </td>
                     
                </tr>
               
              </tbody>
            </table>
            
            <a href="#" class="btn btn-primary">My Sales Performance</a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>





  <div class="col-md-3">
    {!! HTML::image("$image", null, ['class' => 'img-responsive']) !!}
    <ul class="home-list">
      <li>{{ $age }}</li>
      <li>{{ $location }}</li>
      <li><a href="{{ $website }}" target="_blank">{{ $website }}</a></li>
      <li><a href="{{ $github }}" target="_blank">{{ $github }}</a></li>
      <li>    
        <h2>Languages</h2>
        <ul class="list-inline">
      
          @foreach($languageNames as $languageName)
            <li>{{ $languageName }}</li>
          @endforeach

        </ul>
      </li>
    </ul>
  </div>

  <div class="col-md-6">
    <div class="jumbotron">

      <h1 class="page-heading">Hello, {{ $name }}</h1>
  
    </div>
    <div class="jumbotron">
      <p class="well well-lg">{{ $bio }}</p>
    </div>
  </div>

  \







  <!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div class="container">
    <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          {!! HTML::image("$image", null, ['class' => 'img-responsive img-circle', 'alt' => 'user-pic']) !!}
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            {{ $name }}
          </div>
          <div class="profile-usertitle-job">
            Developer
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
          <button type="button" class="btn btn-success btn-sm">Follow</button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav">
            <li>
              <i class="glyphicon glyphicon-home"></i>
              {{ $location }}
            </li>
            <li>
              <i class="glyphicon glyphicon-user"></i>
              {{ $age }}
            </li>
            <li>
              <i class="glyphicon glyphicon-ok"></i>
              {{ $website }}
            </li>
            <li>
              <i class="glyphicon glyphicon-flag"></i>
              {{ $github }}
            </li>
            <ul class="list-inline">
      
              @foreach($languageNames as $languageName)
                <li>{{ $languageName }}</li>
              @endforeach

        </ul>
          </ul>
        </div>
        <!-- END MENU -->
      </div>
    </div>
    <div class="col-md-9">
            <div class="profile-content">
         Some user related content goes here...
            </div>
    </div>
  </div>
</div>
<center>
<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong>
</center>
<br>
<br>






@if(Session::has('flash_message'))
    <div class="alert alert-success">
      {{ Session::get('flash_message') }}
    </div>
  @endif

  <div class="col-md-3">
    {!! HTML::image("$image", null, ['class' => 'img-responsive']) !!}
    <ul class="home-list">
      <li>{{ $age }}</li>
      <li>{{ $location }}</li>
      <li><a href="{{ $website }}" target="_blank">{{ $website }}</a></li>
      <li><a href="{{ $github }}" target="_blank">{{ $github }}</a></li>
      <li>    
        <h2>Languages</h2>
        <ul class="list-inline">
      
          @foreach($languageNames as $languageName)
            <li>{{ $languageName }}</li>
          @endforeach

        </ul>
      </li>
    </ul>
  </div>

  <div class="col-md-6">
    <div class="jumbotron">

      <h1 class="page-heading">{{ $name }}</h1>
      <a class="btn btn-lg btn-primary" href="/messages/{{ $profileId }}/create">Send Message</a>

    </div>
    <div class="jumbotron">
      <p class="well well-lg">{{ $bio }}</p>
    </div>
  </div>



