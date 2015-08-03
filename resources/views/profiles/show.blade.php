@extends('app')

@section('content')

	@if(Session::has('flash_message'))
		<div class="alert alert-success">
			{{ Session::get('flash_message') }}
		</div>
	@endif

  <!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

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
            {{ $occupation }}
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
          <a class="btn btn-sm btn-success" href="/messages/{{ $profileId }}/create">Send Message</a>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav">
            <li>
              Location: 
              {{ $location }}
            </li>
            <li>
              Age: 
              {{ $age }}
            </li>
            <li>
              <p>Website: </p> 
              @if($website)
                <a href="{{ $website }}" target="_blank">{{ $website }}</a>
              @else User has no website
              @endif
            </li>
            <li>
              Github: 
              @if($github)
                <a href="{{ $github }}" target="_blank">{{ $github }}</a>
              @else User has no GitHub
              @endif
            </li>
            <ul class="list-inline">
      		  <li>Languages: </li>
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
            	<h1>About {{ $name }}</h1><hr><br>
         		<p>{{ $bio }}</p>
            </div>
    </div>

	<script src="//code.jquery.com/jquery.js"></script>
	<script>
		$('div.alert').delay(3000).slideUp(300);
	</script>
  </div>

@stop