@extends('app')

@section('content')

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
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu profile-usermenu-home">
          <ul class="nav">
            <li>
              {{ $location }}
            </li>
            <li>
              {{ $age }}
            </li>
            <li>
              @if($website)
                <a href="{{ $website }}" target="_blank" class="sidebar-links"><i class="fa fa-star"></i>Website</a>
              @else User has no website
              @endif
            </li>
            <li>
              @if($github)
                <a href="{{ $github }}" target="_blank" class="sidebar-links"><i class="fa fa-github"></i>GitHub</a>
              @else User has no GitHub
              @endif
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
            	<h1>About {{ $name }}</h1><hr><br>
         		<p>{{ $bio }}</p>
            </div>
    </div>
  </div>

@stop