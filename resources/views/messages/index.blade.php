@extends('app')

@section('content')

	@if($messages)
		<div class="row messages-container" style="padding-top:40px;">
		    <br /><br />
		    <div class="col-md-12">
		        <div class="panel panel-info">
		            <div class="panel-heading">
		                Messages
		            </div>
		            <div class="panel-body">
						@foreach($messages as $message)
					        <ul class="media-list">
					            <li class="media">
					                <div class="media-body">
					                    <div class="media">
					                        <a class="pull-left" href="#">
					                            {!! HTML::image("$message->image", null, ['class' => 'media-object img-circle', 'alt' => 'user-pic', 'height' => '20px', 'width' => '20px']) !!}
					                        </a>
					                        <div class="media-body" >
					                            {{ $message->message }}
					                            <br>
					                            <small class="text-muted">{{ $message->name }} | {{ $message->time }}</small>
					                            {!! Form::open(['data-remote', 'method' => 'PATCH', 'url' => 'messages/' . $message->messageId]) !!}
								                    <ul class="list-inline">
								                        <li class="list-group-item"><a class="btn btn-primary" href="profiles/{{ $message->profileId }}">View Profile</a></li>
								                        <li class="list-group-item"><a class="btn btn-success" href="messages/{{ $message->profileId }}/create">Send Message</a></li>
								                	</ul>
								                {!! Form::close() !!}                    
								                {!! Form::open(['data-remote', 'method' => 'PATCH', 'url' => 'messages/' . $message->messageId]) !!}
                            						{!! Form::submit('Mark as Read', ['class' => 'btn btn-danger mark-as-read-button']) !!}
                    							{!! Form::close() !!}
					                            <hr />
					                        </div>
					                    </div>
					                </div>
					            </li>
					        </ul>
					        <br>
						@endforeach
		            </div>
		        </div>
		    </div>
		</div>
	@else
		<div class="text-center">
			<h1>No Messages</h1>
		</div>
	@endif

@stop