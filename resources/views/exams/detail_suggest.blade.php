@extends('exams.master')
@section('title', 'Home')
@section('content')
<div class="container">
  <div class="content container">
    <div class="col-md-12 width-flash">
    </div>
<div id="question" class="row">
  <div class="col-md-12">
    <h2><b>Question</b></h2>
    <table id="table-show" width="100%">
      <tbody><tr>
        <td width="40%"><b>Content</b></td>
        <td>What is MySQL released?</td>
      </tr>
      <tr>
        <td><b>Option</b></td>
        <td>
          <table id="table-show-render" width="100%">
            <tbody><tr>
              <td width="15%">
                <span class="label label-danger">Wrong</span>
              </td>
              <td>
                1994
              </td>
            </tr>
            <tr>
              <td width="15%">
                <span class="label label-primary">Correct</span>
              </td>
              <td>
                1995
              </td>
            </tr>
            <tr>
              <td width="15%">
                <span class="label label-danger">Wrong</span>
              </td>
              <td>
                1996
              </td>
            </tr>
            <tr>
              <td width="15%">
                <span class="label label-danger">Wrong</span>
              </td>
              <td>
                1997
              </td>
            </tr>
          </tbody></table>
        </td>
      </tr>
      <tr>
        <td><b>Subject</b></td>
        <td>MySQL</td>
      </tr>
      <tr>
        <td><b>Question type</b></td>
        <td>Single_choice</td>
      </tr>
      <tr>
        <td><b>State</b></td>
        <td>
          <div class="state-label label label-warning">
            Waiting
          </div>
        </td>
      </tr>
    </tbody></table>
    <a class="btn btn-primary glyphicon glyphicon-pencil btn-width" data-no-turbolink="true" href="/users/2424/questions/1693/edit">Edit</a>
    <a data-confirm="Are you sure?" class="btn btn-danger glyphicon glyphicon-trash btn-width" rel="nofollow" data-method="delete" href="/users/2424/questions/1693">Delete</a>
  </div>
</div>
</div>
</div>
@endsection
