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


  <!-- Present Contests -->
  @if(count($present_contests) > 0)
    <div class="row contest-header">
      <h5>Present Contests</h5>
    </div>
    <table id="present-challenges-table" class="bordered highlight">
       <thead>
         <tr>
             <th data-field="id">Contest</th>
             <th data-field="name">Start Time</th>
             <th data-field="price">End Time</th>
         </tr>
       </thead>

       <tbody>
         <!-- Present Contests -->
         @foreach($present_contests as $present_contest)
            <tr>
              <td>
                <a class="teal-text text-darken-1" href = "{{ route('show_challenge', array('contest_name' => $present_contest->name)) }}">{{ $present_contest->name }}</a>
              </td>
              <td>{{ $present_contest->start }}</td>
              <td>{{ $present_contest->end }}</td>
            </tr>
         @endforeach
       </tbody>
     </table>
     <hr>
   @endif


  <!-- Future Contests -->
  @if(count($future_contests) > 0)
    <div class="row contest-header">
      <h5>Future Contests</h5>
    </div>

    <table id="future-challenges-table" class="bordered highlight">
       <thead>
         <tr>
             <th data-field="id">Contest</th>
             <th data-field="name">Start Time</th>
             <th data-field="price">End Time</th>
         </tr>
       </thead>

       <tbody>
         <!-- Future Contests -->
         @foreach($future_contests as $future_contest)
            <tr>
              <td>
                <a class="teal-text text-darken-1" href="#">{{ $future_contest->name }}</a>
              </td>
              <td>{{ $future_contest->start }}</td>
              <td>{{ $future_contest->end }}</td>
            </tr>
         @endforeach
       </tbody>
     </table>
     <hr>
   @endif

  <!-- Past Contests -->
  @if(count($past_contests) > 0)
    <div class="row contest-header">
      <h5>Past Contests</h5>
    </div>
    <table id="past-challenges-table" class="bordered highlight">
       <thead>
         <tr>
             <th data-field="id">Contest</th>
             <th data-field="name">Start Time</th>
             <th data-field="price">End Time</th>
         </tr>
       </thead>

       <tbody>
         <!-- Past Contests -->
         @foreach($past_contests as $past_contest)
            <tr>
              <td>
                <a class="teal-text text-darken-1" href = "{{ route('show_challenge', array('contest_name' => $past_contest->name)) }}">{{ $past_contest->name }}</a>
              </td>
              <td>{{ $past_contest->start }}</td>
              <td>{{ $past_contest->end }}</td>
            </tr>
         @endforeach
       </tbody>
     </table>
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

    $('#present-challenges-table').dataTable();
    $('#past-challenges-table').dataTable();
    $('#future-challenges-table').dataTable();

  });

  new WOW().init();
</script>

@stop
