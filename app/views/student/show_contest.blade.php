@extends('layouts.master')

@section('content')

  <div class="container" style="margin-left:25%;">

    <ul class="collection">
    @foreach($problems as $problem)
      <li class="collection-item avatar">
        <i class="material-icons circle teal darken-1">code</i>
        <span class="title">{{ $problem->title }}</span>
        <p>Time Limit : {{ $problem->time_limit }} second<br>
           Memory Limit : {{ $problem->memory_limit }} MB
        </p>
        <a href="{{ route('show_problem', array('problem_id' => $problem->id)) }}" class="secondary-content"><i class="material-icons right">send</i></a>
      </li>
    @endforeach
  </ul>

  </div>


@stop
