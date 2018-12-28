@extends('master')
@section('title', 'Home')
@section('content')
<div class="container">
  <div class="content container">
    <div class="col-md-12 width-flash">
    </div>
    <div id="question" class="row">
      <div class="col-md-12">
        <h2><b>Suggest Question</b></h2>
        <form class="new_question" id="new_question" action="/users/2431/questions" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="rS/BiXBVaS/7P9/dImH0BH4Fwak/LvNx3/WSEagiuiIg2LpDNwHakEMOpHDNr6f0qCKU4X0UYHx6R+4Q1by2VA==">
        
        <label class="space-top" for="question_subject">Subject</label>
        <select class="form-control" name="exam_subject" id="exam_subject_id">
            @foreach($subjects as $subject)
              <option value="{!! $subject->id !!}">{!! $subject->name_subject !!}</option>
            @endforeach
          </select>
        <label class="space-top" for="question_content">Content</label>
        <textarea cols="40" rows="10" class="form-control" name="question[content]" id="question_content"></textarea>
        <span class="help-block">User can use <code>&lt;pre&gt;&lt;code class="language-css"&gt;your code here&lt;/code&gt;&lt;/pre&gt;</code> to input it on question content.</span>
        <label class="space-top" for="question_question_type">Question type</label>
        <select class="form-control width-question-type" name="question[question_type]" id="question_question_type"><option value="single_choice">single choice</option>
        <option value="multiple_choice">multiple choice</option>
        <option value="text">text</option></select>
        <div class="space-top">
          <div class="group">
          <div id="answer1" class="form-group answer-field-box clearfix">
            <label class="answer-title" for="question_options_attributes_0_content">Option</label>
            <div class="col-md-12">
              <div class="col-md-8">
                <input class="form-control" type="text" name="question[options_attributes][0][content]" id="question_options_attributes_0_content">
              </div>
              <div class="check-box-remove">
                <div class="col-md-2 ">
                  <input name="question[options_attributes][0][correct]" type="hidden" value="0"><input class="check-box" type="checkbox" value="1" name="question[options_attributes][0][correct]" id="question_options_attributes_0_correct">
                  <label for="question_options_attributes_0_correct" style="font-size: 18px"> Correct?</label>
                </div>
                <div class="col-md-2 space-top-remove">
                  <input type="hidden" value="false" name="question[options_attributes][0][_destroy]" id="question_options_attributes_0__destroy">
                  <a id="answer1" class="remove-button text-danger" href="#" style="font-size: 18px">
                    <span class="glyphicon glyphicon-trash"></span> Remove</a>
                </div>
              </div>
            </div>
          </div>
        </div>
          <p class="option-fields">
            <a id="add-answer" class="fa fa-plus" href="#"><span class="glyphicon glyphicon-plus "></span> Add more</a>
          </p>
        </div>
        <input type="submit" name="commit" value="Suggest" class="btn btn-primary button space-top-submit">
      </form>
    </div>
  </div>
</div>
</div>
@endsection
@push('js')
    <script type="text/javascript">

    var i = 2;
    $('#add-answer').click(function(event) {
      event.preventDefault();
      var d =  "<div id='answer"+i+"' class='form-group answer-field-box clearfix'>"+
               "<label class='answer-title' for='question_options_attributes_0_content'>Option</label>"+
              "<div class='col-md-12'>"+
                "<div class='col-md-8'>"+
                   "<input class='form-control' type='text' name='question[options_attributes][0][content]' id='question_options_attributes_0_content'>"+
                "</div>"+
              "<div class='check-box-remove'>"+
                "<div class='col-md-2'>"+
                "<input name='question[options_attributes][0][correct]' type='hidden' value='0'>"+
                "<input class='check-box' type='checkbox' value='1' name='question[options_attributes][0][correct]' id='question_options_attributes_0_correct'>"+
                "<label for='question_options_attributes_0_correct' style='font-size: 18px'> Correct?</label>"+
                "</div>"+
              "<div class='col-md-2 space-top-remove'>"+
                "<input type='hidden' value='false' name='question[options_attributes][0][_destroy]' id='question_options_attributes_0__destroy'>"+
                "<a id='answer"+i+"' class='remove-button text-danger' href='#' style='font-size: 18px'>"+
                "<span class='glyphicon glyphicon-trash'></span> Remove</a>"+
              "</div></div></div></div>";
        $(".group").append(d);
        i++;
    });

    $(document).on('click','a.remove-button',function(event) {
      event.preventDefault();
      $('div[id='+$(this).attr('id')+']').remove();
    });
        
    </script> 
@endpush