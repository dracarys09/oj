@extends('layouts.master')

@section('content')

  <div class="container" style="margin-left:25%;">

    <h4>{{ $problem->title }}</h4>
    <hr>

    {{ $problem->description }}

    <br>
    <hr>

    <h5>Constraints</h5>
    <i>Time Limit : {{ $problem->time_limit }} seconds </i>
    <br>
    <i>Memory Limit : {{ $problem->memory_limit }} MB </i>

    <div class="row">
      <form class="col s12" action="{{ route('submit_solution', array('problem_id' => $problem->id)) }}" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s6">
            <b>Solution File</b>
            <input id="solution_file" name="solution_file" type="file" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input class="btn" type="submit" name="submit" value="Submit">
          </div>
        </div>
      </form>
    </div>

  </div>

@stop
