@extends('layouts.master')

@section('content')

<div class="container" style="margin-left:25%;">
  <div class="fixed-action-btn">
    <a class="modal-trigger btn-floating btn-large waves-effect waves-light blue" href="#add-problem-modal"><i class="material-icons">add</i></a>
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


  <!-- Add Problem Modal Structure -->
  <div id="add-problem-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="row">
        <form class="col s12" method="POST" action="{{ URL::route('add_problem') }}">
          <div class="row">
            <div class="input-field col s6">
              <input id="name" name="name" type="text" required>
              <label for="name" style="color:#000;">Problem Title</label>
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
