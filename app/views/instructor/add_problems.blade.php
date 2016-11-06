@extends('layouts.master')

@section('content')

<div class="container" style="margin-left:25%;">

  <ul class="collapsible problems-accordian" data-collapsible="accordion">
    <li>
      <div class="collapsible-header btn-large waves-effect waves-light teal"><i class="material-icons">add</i></div>
      <div class="collapsible-body">

        <div class="row">
          <form class="col s12" method="POST" action="{{ route('add_problem', array('contest_id' => $contest->id)) }}">
            <div class="row">
              <div class="input-field col s6">
                <input id="name" name="name" type="text" style="margin-left:5%;" required>
                <label for="name" style="color:#000; margin-left:5%;">Problem Title *</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <span style="margin-left:2.5%;">Problem Statement *</span>
                <textarea id="description" name="description" class="ckeditor"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s6">
                <input id="time-limit" name="time_limit" type="text" style="margin-left:5%;">
                <label for="time-limit" style="color:#000; margin-left:5%;">Time Limit (seconds)</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s6">
                <input id="memory-limit" name="memory_limit" type="text" style="margin-left:5%;">
                <label for="memory-limit" style="color:#000; margin-left:5%;">Memory Limit (MBs)</label>
              </div>
            </div>

            <div class="row">
              <div class="col s12 offset-s5">
                <input class="btn" type="submit" name="submit" value="ADD">
              </div>
            </div>

          </form>
        </div>

      </div>
    </li>

    @foreach($problems as $problem)
      <li>
        <div class="collapsible-header"><i class="material-icons">code</i>{{ $problem->title}}
          <span style="float:right;">
            <a class="waves-effect waves-light btn modal-trigger" href="#testcase" style="float:left;margin-top:3%;">ADD TESTCASE</a>

            <a href = "{{ route('delete_problem', array('problem_id' => $problem->id)) }}" class="black-text">
              <i class="material-icons">delete</i>
            </a>
          </span>
        </div>
        <div class="collapsible-body"><p>{{ $problem->description }}</p>
          <hr>
          <b>Time Limit : </b><span>{{ $problem->time_limit }} second</span>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <b>Memory Limit : </b><span>{{ $problem->memory_limit }} MB</span>
        </div>
      </li>

      <!-- Add Testcase Modal Structure -->
      <div id="testcase" class="modal">
        <div class="modal-content">
          <h4>Testcase</h4>
          <!-- Form uploading for input and output testcase files -->
          <div class="row">
            <form class="col s12" method="POST" action="{{ route('add_testcase',array('problem_id' => $problem->id)) }}" enctype="multipart/form-data">
              <div class="row">
                <div class="input-field col s6">
                  <b>Input File:</b>
                  <input id="input_file" name="input_file" type="file" required>
                </div>
                <div class="input-field col s6">
                  <b>Output File:</b>
                  <input id="output_file" name="output_file" type="file" required>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input type="submit" name="submit" class="btn col s12" value="SUBMIT">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    @endforeach

  </ul>

  @if(Session::has('flash_message'))
      <div class="row">
        <div class="col s12 m12">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <div class = "row">
                <div class = "alert alert-success alert-dismissible" role = "alert"><strong>{{ Session::get('flash_message') }}</strong></div>
              </div>
            </div>
            <div class="card-action">
              <a class="dismiss" onclick="dismiss()">Dismiss</a>
            </div>
          </div>
        </div>
      </div>
  @endif


</div>




<!-- jQuery helper code -->
<script>
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();

    dismiss = function() {
      $('.dismiss').parent().parent().parent().parent().css("display","none");
    }


  });

  new WOW().init();
</script>

@stop
