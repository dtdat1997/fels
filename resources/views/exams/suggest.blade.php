@extends('exams.master')
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
				<form class="new_exam" id="new_exam" action="/" accept-charset="UTF-8" method="post"> 
					<input type="hidden" name="_token" value="{{ csrf_token() }}">     
				</form>
			</div>
		<hr>
		<h2><b>Suggested Question</b>
		<a class="pull-right link-text-question" href="suggest/new" style="font-size: 14px">
			<span class="glyphicon glyphicon-plus"></span>New question</a></h2>
			<table class="table">
				<thead>
					<tr><th class="number_id">STT</th>
					<th class="content">Question</th>
					<th class="subject">Subject</th>
					<th class="type">Type</th>
					<th class="state">State</th>
					<th class="action"></th>
				</tr>
				</thead>
				<tbody>
				@foreach($suggests as $key => $sug)
					<tr>
						<td id="{{ $sug->id }}">{{ ++$key }}</td>
						<td><a href="/">{{ $sug->content_question }}</a></td>
						<td>{{ $sug->subject->name_subject }}</td>
						<td>Single_choice</td>
						<td><div class="label label-warning">Waiting</div></td>
						<td>
					      <a class="glyphicon glyphicon-edit icon-padding link-underline" href=""></a>
					      <a data-confirm="Are you sure?" class="glyphicon glyphicon-trash icon-padding link-underline" rel="nofollow" href="/suggest/remove/{{ $sug->id }}"></a>
					 	</td>
					</tr>
				@endforeach
			</tbody>
			</table>
	</div></div>
</div>
@endsection
@push('js')
    <script type="text/javascript">
        
    </script> 
@endpush