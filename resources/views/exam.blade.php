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
     {!! $exams->created_at !!}<br>
      <center><b><h2>{!! $exams->subject['name_subject'] !!}</h2></b></center>
      <hr>
      <input type="hidden" name="duration" id="duration" value="0">
    </div>
	<form class="edit_exam" id="edit_exam" action="" accept-charset="UTF-8" method="post">
		<input name="utf8" type="hidden" value="✓">
		<input type="hidden" name="_method" value="patch">
		<input type="hidden" name="authenticity_token" value="wNP2VHpKw16NG4eEV/1vByxRebzQ6RehCMiLVKjhvaWkLfORmgYDndlxTG6rB/jJ+id+WAAU0Uqo6hJCW2b3Mg==">
	<ol>
        @foreach($userQs[0]->questions as $qs)
    		<li class="questions_class" id="{{ $qs->pivot->id }}">
            <strong>{!! $qs->content_question !!}</strong>     

          @foreach($qs->answers as $answer) 
                <label class="radio" for="exam_results_attributes_0_answers_attributes_0_option_id">
                    <input type="radio" value={{ $answer->id }} class="radio" name="exam_answer_{{ $answer->question_id }}" 
                    id="exam_results_attributes_0_answers_attributes_0_option_id_3111">{{ $answer->content_answer }}
                </label>
               @endforeach  
            </li> 

            <input type="hidden" value="426679" name="exam[results_attributes][0][id]" id="exam_results_attributes_0_id">
        @endforeach
        <br><br>
	</ol>
    </form>
    <div id="btn-submit-form-group">
      <div class="container">
        <div class="row">
          <input type="submit" id="btSave" name="commit" value="Save" class="btn btn-primary btn-submit submit-time-out" onclick="getAnswer()">
          <input type="submit" name="commit" value="Finish" class="btn btn-danger btn-submit pull-right" id="btn-finish" data-confirm="Are you sure to finish your exam ?
            You can't change your answers after you click button OK.">
        </div>
      </div>
    </div>
		
	<div class="timer">
	    <h4>Time remaining:</h4>
	    <div id="clock" class="is-countdown">
            <div id='tiles'></div>
	    	<span class="countdown-row countdown-show3">
	    		<span class="countdown-section">
                    <span class="countdown-amount" id="hours"></span>
	    		    <span class="countdown-period">Hours</span>
                </span>
                <span class="countdown-section">
	    	      	<span class="countdown-amount" id="minutes"></span>
                    <span class="countdown-period">Minutes</span>
	    	    </span>
	    	    <span class="countdown-section">
                    <span class="countdown-amount" id="seconds"></span>
                    <span class="countdown-period">Seconds</span>
                </span>
            </span>
        </div>
	</div>
	</div>
</div>

@endsection
@push('js')
    <script type="text/javascript">
    var target = 1200;
    var a;
    $(document).ready(function () {
        a = setInterval(function () { getCountdown(); }, 1000);
              
    });
    function getCountdown(){
        
        hours = parseInt(target / 3600) ;
        minutes = parseInt(target / 60);
        seconds = parseInt(target % 60);

        localStorage.setItem('hours',  hours);
        localStorage.setItem('minutes',  minutes);
        localStorage.setItem('seconds',  seconds);

        document.getElementById("hours").innerHTML = localStorage.getItem('hours');
        document.getElementById("minutes").innerHTML = localStorage.getItem('minutes');
        document.getElementById("seconds").innerHTML = localStorage.getItem('seconds');
        if(target==0)
        {
            clearInterval(a);
            document.getElementById("hours").innerHTML = "00";
            document.getElementById("minutes").innerHTML = "00";
            document.getElementById("seconds").innerHTML = "00";
            var radio = document.querySelectorAll("input.radio").forEach((function(x){ x.setAttribute("disabled",true);}))
        }
        target--;
    }

    function getAnswer(){
        let user_answer = [];
        $('.questions_class').each(function( index, value ) {
            id = $(this).attr('id');
            answer = $(this).find('input[type="radio"]:checked').val();
            user_answer.push({'id': id,'answer': answer});
        });
        return user_answer;

    }
    $('#btSave').click(function(event) {
        /* Act on the event */
        $.ajax({
            url: '/save/'+{!! $exams->id !!},
            type: 'POST',
            dataType: 'json',
            data: {'data': getAnswer(),'_token': "{{ csrf_token() }}"}
        })
        .done(function() {
            window.location.href("/");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    });
        
    </script> 
@endpush