@extends('master')
@section('title', 'Home')
@section('content')
<div class="container">
	<div class="content container">
		<div class="col-md-12 width-flash">
		</div>
	</div>
	<div class="row exam">
		<div class="col-md-12">
			<div class="form-exam">
				@if(!Auth::check())
					die();
				@endif
				{{-- @if ($subjects->isEmpty())
               		 <p> There is no subject.</p>
           		@else --}}
				<form class="new_exam" id="new_exam" action="/" accept-charset="UTF-8" method="post">
					@foreach ($errors->all() as $error)
						<p class="alert alert-danger">{{ $error }}</p>
					@endforeach
					@if (session('status'))
						<div class="alert alert-success">
						{{ session('status') }}
						</div>
					@endif
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

				{{-- @endif --}}
				
				</form>
			</div>
			<hr>
			<h2><b>Suggested Question</b>
				
      <a class="pull-right link-text-question" href="suggest/new" style="font-size: 14px">
        <span class= "glyphicon glyphicon-plus"></span>New question</a></h2>
			<table class="table">
			<thead>
				<th class="number_id">STT</th>
		        <th class="content">Question</th>
		        <th class="subject">Subject</th>
		        <th class="type">Type</th>
		        <th class="state">State</th>
		        <th class="action"></th>
			</thead>

		</div>
	</div>
</div>
@endsection