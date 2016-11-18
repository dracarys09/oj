@extends('layouts.master')

@section('content')

<div class="container" style="margin-left:25%;">


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


    <?php $cnt = 1; ?>

    <!-- All Submissions -->
    <div class="row contest-header">
      <h5>{{ $user->name }}'s Submissions for <a href="{{ URL::route('show_problem',array('problem_id' => $problem->id)) }}">{{ $problem->title }}</a></h5>
    </div>
    <table id="results-table" class="bordered highlight">
       <thead>
         <tr>
             <th data-field="id">#</th>
             <th data-field="name">Date/Time</th>
             <th data-field="result">Result</th>
             <th data-field="solution">Solution</th>
         </tr>
       </thead>

       <tbody>
         <!-- Present Contests -->
         @foreach($solutions as $solution)
            <tr>
              <td style="padding-left:2%;"><b>{{ $cnt }}</b></td>
              <td>{{ $solution->created_at }}</td>
              @if($solution->result == "Wrong Answer")
                <td class="wrong-answer">{{$solution->result}}</td>
              @elseif($solution->result == "Accepted")
                <td class="accepted">{{$solution->result}}</td>
              @elseif($solution->result == "Compilation Error")
                <td class="compilation-error">{{$solution->result}}</td>
              @endif
              <td><a style = "padding-left:8%;" href="{{ URL::route('view_solution',array('$solution_id' => $solution->id)) }}">View</a></td>
            </tr>
            <?php $cnt++; ?>
         @endforeach
       </tbody>
     </table>
     <hr>

</div>




<!-- jQuery helper code -->
<script>
  $(document).ready(function(){

    $('#results-table').dataTable();
    $('.wrong-answer').each(function() {
      $(this).attr('style','color:red');
    });
    $('.accepted').each(function() {
      $(this).attr('style','color:green');
    });
    $('.compilation-error').each(function() {
      $(this).attr('style','color:yellow');
    });

  });
</script>

@stop
