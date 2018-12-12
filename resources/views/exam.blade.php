@extends('master')
@section('title', 'Home')
@section('content')
<div class="container">
	<div class="content container">
		<div class="col-md-12 width-flash">
		</div>
	</div>
	<div class="row exam">
	<div class="title">
      Exam date : 
      18/11/16 13:18<br>
      <center><b><h2>PHP Basic</h2></b></center>
      <hr>
      <input type="hidden" name="duration" id="duration" value="0">
    </div>
	



	
	<div class="timer">
	    <h4>Time remaining:</h4>
	    <div id="clock" class="is-countdown"><span class="countdown-row countdown-show3"><span class="countdown-section"><span class="countdown-amount">0</span><span class="countdown-period">Hours</span></span><span class="countdown-section"><span class="countdown-amount">0</span><span class="countdown-period">Minutes</span></span><span class="countdown-section"><span class="countdown-amount">0</span><span class="countdown-period">Seconds</span></span></span></div>
	 </div>

	</div>
</div>
@endsection
@push('js')
	
@endpush