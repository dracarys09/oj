@extends('layouts.master')

@section('content')

<div class="container" style="margin-left:25%;">
  <div class="fixed-action-btn">
    <a class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">add</i></a>
  </div>



  <div class="row">
    <div class="col s12 m6">
      <div class="card teal darken-2">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
    <div class="col s12 m6">
      <div class="card teal darken-1">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>

</div>

@stop
