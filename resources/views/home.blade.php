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
				@if ($subjects->isEmpty())
               		 <p> There is no subject.</p>
           		@else
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
				<div class="select-subject col-md-2">
					<select name="exam_subject" id="exam_subject_id">
						@foreach($subjects as $subject)
							<option value="{!! $subject->id !!}">{!! $subject->name_subject !!}</option>
						@endforeach
					</select>
				</div>
				@endif
				<input type="submit" name="commit" value="Create Exam" class="btn-create">
				</form>
			</div>
			<hr>
			<h3>List Of Exams</h3>
			<table class="table">
			<thead>
				<tr><th class="created_date">Created Date</th>
				<th class="subject">Subject</th>
				<th class="status">Status</th>
				<th class="duration">Duration</th>
				<th class="question_number">Question number</th>
				<th class="spent_time">Spent Time</th>
				<th class="score">Score</th>
				<th class="action"></th></tr>
			</thead>
			<tbody>
				@foreach($exams as $exam)
					<tr>
					<td>{!! $exam->created_at !!}</td>
					<td>{!! $exam->name_subject !!}</td>
					<td><span class="label label-primary">start</span>
					</td>
					<td>{!! $exam->duration !!}</td>
					<td>{!! $exam->question_number !!}</td>
					<td>@if(is_null($exam->spent_time))
								{{ '00:00:00' }}
						@endif
					</td>
					<td>{!! $exam->score !!}</td>
					<td><a class="btn btn-primary button" href="/exams">Start</a></td>
					</tr>
				@endforeach
		<!-- 	<tr>
			<td>2018-11-14  9:37 AM</td>
			<td>Git</td>
			<td><span class="label label-info">unchecked</span>
			</td>
			<td>20</td>
			<td>30</td>
			<td>00:17:20</td>
			<td>-</td>
			<td><a class="btn btn-success button" href="/exams/14643">View</a></td>
		</tr> -->
			</tbody></table>
		</div>
	</div>
</div>
@endsection