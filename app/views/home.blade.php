@extends('layouts.main')

@section('homepage')

  <nav class="teal darken-1" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo orange-text">C{ }DE</a>
      <a href="#login-modal" class="right modal-trigger">Login</a>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>

    <!-- Student Login Modal Structure -->
    <div id="login-modal" class="modal login-modal">
      <div class="modal-content">
        <h4>Login Below</h4>
        <div class="row">
          <form class="col s6" method = "POST" action = "{{ URL::route('login') }}">
            <div class="row">
              <div class="input-field col s12">
                <span>Email:</span>
                <input id="email" name="email" type="email" class="validate" placeholder="someone@example.com" required>
              </div>
              <div class="input-field col s12">
                <span>Password:</span>
                <input id="pass" name="password" type="password" placeholder="Your password" required>
              </div>
              <div class="input-field col s12">
                <button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


  </nav>


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

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h2 class="header center teal-text wow fadeIn">Love Beautiful Code? We do too.</h2>
      <div class="row center">
        <h5 class="header col s12 light">A modern responsive Online Judge based on Material Design</h5>
      </div>
      <div class="row center">
        <a href="#register-modal" id="download-button" class="btn-large waves-effect waves-light teal modal-trigger">Register</a>
      </div>
      <br><br>

      <!-- Register Modal Structure -->
      <div id="register-modal" class="modal bottom-sheet register-modal">
        <div class="modal-content">
          <div class="row">
            <form class="col s12" method="POST" action="{{ URL::route('register') }}">
              <div class="row">
                <div class="input-field col s6">
                  <input id="name" name="name" type="text" required>
                  <label for="name" style="color:#000;">Name</label>
                </div>

                <div class="input-field col s6">
                  <input id="email" name="email" type="email" required>
                  <label for="email" style="color:#000;">Email</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s6">
                  <input id="password" name="password" type="password" required>
                  <label for="password" style="color:#000;">Password</label>
                </div>

                <div class="input-field col s6">
                  <input id="password_again" name="password_again" type="password" required>
                  <label for="password_again" style="color:#000;">Password Again</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s4">
                  <select name="dept" required>
                      <option value="" disabled="disabled" selected="selected">Department</option>
                      <option value="CSE">CSE</option>
                      <option value="ME">ME</option>
                      <option value="EE">EE</option>
                      <option value="CE">CE</option>
                  </select>
                </div>

                <div class="input-field col s4">
                  <input id="roll" name="roll" type="text" required>
                  <label for="roll" style="color:#000;">Rollno/EmpId</label>
                </div>

                <div class="input-field col s4">
                  <select name="type" required>
                      <option value="" disabled="disabled" selected="selected">Type</option>
                      <option value="0">Instructor</option>
                      <option value="1">Student</option>
                  </select>
                </div>


              </div>

              <div class="row">
                <button class="col s4 push-s4 btn waves-effect waves-light" type="submit" name="register">Register
                  <i class="material-icons left">fast_rewind</i>
                  <i class="material-icons right">fast_forward</i>
                </button>
              </div>

            </form>
          </div>
        </div>

      </div> <!-- End Modal -->

    </div>

  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row wow bounceInUp">

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Support for multiple languages</h5>

            <p class="light">Choose a programming language from a plethora of options, enter the source code and you are ready to go!</p>
          </div>
        </div>


        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a system that incorporates components and animations that provide more feedback to users and it is lightening fast!</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons">code</i></h2>
            <h5 class="center">Eat, Sleep, Code &amp; Repeat </h5>
            <p class="light">We provide an easy to work with user interface for a greater user experience. We are also always open to feedback and can answer any questions a user may have about our Online Judge.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>

  </div>


  <footer class="page-footer teal darken-1">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">About Us</h5>
          <p class="grey-text text-lighten-4">
            <a class="orange-text text-lighten-3" target="_blank" href="https://github.com/dracarys09"> Abhijeet </a>
             is a student of
             <a class="orange-text text-lighten-3" target="_blank" href="http://www.iitb.ac.in/"> IIT Bombay </a>
             working on this project. Any amount of help would support this project and is greatly appreciated.
             Source code is hosted on <a target="_blank" href="https://github.com/dracarys09/oj" class="orange-text text-lighten-3">Github</a>.
          </p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made with love using <a class="orange-text text-lighten-3" target="_blank" href="http://materializecss.com"> Materialize </a> &amp; <a class="orange-text text-lighten-3" href="https://laravel.com/">Laravel</a>
      </div>
    </div>
  </footer>


  <!-- jQuery helper code -->
  <script>
    $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal();
      //Materialize.updateTextFields();
      $('select').material_select();

      dismiss = function() {
        $('.dismiss').parent().parent().parent().parent().css("display","none");
      }

    });

    new WOW().init();


  </script>


@stop
