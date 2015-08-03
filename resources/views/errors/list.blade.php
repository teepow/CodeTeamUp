@if($errors->any())
    <div class="alert alert-danger alert-dismissable">
      	<a class="panel-close close" data-dismiss="alert">×</a> 
      	<i class="fa fa-coffee"></i>
      	@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
	 	@endforeach
    </div>
@endif