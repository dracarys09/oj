@extends('layouts.master')

@section('content')

<div class="container" style="margin-left:25%;">
  <div class="fixed-action-btn">
    <a class="modal-trigger btn-floating btn-large waves-effect waves-light blue" href="#add-challenge-modal"><i class="material-icons">add</i></a>
  </div>

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


  <!-- Add Challenge Modal Structure -->
  <div id="add-challenge-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="row">
        <form class="col s12" method="POST" action="{{ URL::route('create_challenge') }}">
          <div class="row">
            <div class="input-field col s6">
              <input id="name" name="name" type="text" required>
              <label for="name" style="color:#000;">Contest Name</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s6">
              Start:
              <input id="start" name="start" type="datetime-local" required>
            </div>

            <div class="input-field col s6">
              End:
              <input id="end" name="end" type="datetime-local" required>
            </div>
          </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn waves-effect waves-light" type="submit" name="create">Create
        <i class="material-icons right">send</i>
      </button>
    </div>
    </form>
  </div><!-- End Create Challenge Modal -->

  <div class="row contest-header">
    <h5>Present &amp; Future Contests</h5>
  </div>
  <!-- Future Contests -->
  <div class="row">
  @if(count($future_contests) > 0)
    @foreach($future_contests as $future_contest)
        <div class="col s6 m6">
          <div class="card teal darken-1">
            <div class="card-content white-text">
              <div class="row">
                <span class="card-title">{{ $future_contest->name }}</span>
              </div>
              <div class="row">
                <span>{{ $future_contest->start }}</span>
              </div>
              <div class="row">
                <span>{{ $future_contest->end }}</span>
              </div>
            </div>
            <div class="card-action">
              <a href = "{{ route('edit_problems', array('contest_name' => $future_contest->name)) }}" class="btn-floating btn waves-effect waves-light blue"><i class="material-icons">edit</i></a>
              <a href = "{{ route('delete_challenge', array('challenge_id' => $future_contest->id)) }}" class="btn-floating btn waves-effect waves-light red"><i class="material-icons">delete</i></a>
            </div>
          </div>
        </div>
    @endforeach
  @endif
  </div>

  <hr>

  <div class="row contest-header">
    <h5>Past Contests</h5>
  </div>
  <!-- Past Contests -->
  <div class="row">
  @if(count($past_contests) > 0)
    @foreach($past_contests as $past_contest)
        <div class="col s6 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <div class="row">
                <span class="card-title">{{ $past_contest->name }}</span>
              </div>
              <div class="row">
                <span>{{ $past_contest->start }}</span>
              </div>
              <div class="row">
                <span>{{ $past_contest->end }}</span>
              </div>
            </div>
            <div class="card-action">
              <a href = "#" class="disabled btn-floating btn waves-effect waves-light blue"><i class="material-icons">edit</i></a>
              <a href = "{{ route('delete_challenge', array('challenge_id' => $past_contest->id)) }}" class="btn-floating btn waves-effect waves-light red"><i class="material-icons">delete</i></a>
            </div>
          </div>
        </div>
    @endforeach
  @endif
  </div>

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
