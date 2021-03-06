<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Online Judge</title>


    <!--Import Google Icon Font-->
    <!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('assets/css/materialize.min.css') }}" media="screen,projection">

    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" media="screen,projection">

    <!-- Animate CSS -->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('assets/css/animate.min.css') }}" media="screen,projection">

    <!--DataTables-->
    {{ HTML::style('assets/datatables/DataTables-1.10.2/media/css/jquery.dataTables.css') }}

    <!-- Syntax Highlighter -->
    <!-- {{ HTML::style('assets/syntaxhighlighter_3.0.83/styles/shCore.css') }} -->
    <!-- {{ HTML::style('assets/syntaxhighlighter_3.0.83/styles/shThemeDefault.css') }} -->
    {{ HTML::style('assets/google-code-prettify/prettify.css') }}


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    <!-- Important Scripts -->
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-2.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/materialize.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('assets/js/init.js') }}"></script>
    <!-- Datatable -->
    {{ HTML::script('assets/datatables/DataTables-1.10.2/media/js/jquery.dataTables.js') }}
    <!-- Syntax Highlighter -->
    <!-- {{ HTML::script('assets/syntaxhighlighter_3.0.83/src/shCore.js') }} -->
    {{ HTML::script('assets/google-code-prettify/prettify.js') }}


  </head>


  <body class="dashboard-body">


    <div class="row">

      <div class="col s3 dashboard-left">
        <ul id="slide-out" class="side-nav fixed" style="background-color:#2e3d49;">

          <li class="dashboard-logo"><a id="logo-container" href="{{ URL::route('dashboard') }}" class="brand-logo orange-text">C{ }DE</a></li>

          <div class="dashboard-top-options">
            <!-- <li><a href="{{ URL::route('dashboard') }}" class="grey-text text-lighten-1"><i class="medium material-icons teal-text text-darken-2" style="margin-right:20%;">person</i>Home</a></li> -->
            <li><a href="{{ URL::route('challenges') }}" class="grey-text text-lighten-1"><i class="medium material-icons teal-text text-darken-2" style="margin-right:20%;">code</i>Challenges</a></li>
          </div>

          <div class="dashboard-bottom-options">
            <li><a  href="#" class="grey-text text-lighten-1"><i class="medium material-icons teal-text text-darken-2" style="margin-right:20%;">settings</i>Settings</a></li>
            <li><a  href="{{ URL::route('logout') }}" class="grey-text text-lighten-1"><i class="medium material-icons teal-text text-darken-2"  style="margin-right:20%;">flight</i>Logout</a></li>
          </div>

        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>

      <div class="col s9" style="margin-left:-3%;">
        <div class="navbar-fixed">
          <nav class="dashboard-nav white">
            <!-- Navigation Logic -->
            <div class="nav-wrapper">
              @if(Route::currentRouteName() == "instructor_dashboard")
                <h5 class="grey-text text-darken-2 dashboard-nav-heading">Dashboard</h5>
              @elif(Route::currentRouteName() == "student_dashboard")
                <h5 class="grey-text text-darken-2 dashboard-nav-heading">Dashboard</h5>
              @elseif(Route::currentRouteName() == "challenges")
                <a class="teal-text dashboard-nav-heading" href="{{ route('challenges') }}">Challenges</a>
              @elseif(Route::currentRouteName() == "show_challenge")
                <a class="teal-text dashboard-nav-heading" href="{{ route('challenges') }}">Challenges ></a>
                <a style="margin-left:-2%;" class="teal-text dashboard-nav-heading" href="{{ route('show_challenge', array('contest_name' => $challenge->name)) }}">{{ $challenge->name }}</a>
              @elseif(Route::currentRouteName() == "show_problem")
                <a class="teal-text dashboard-nav-heading" href="{{ route('challenges') }}">Challenges ></a>
                <a style="margin-left:-2%;" class="teal-text dashboard-nav-heading" href="{{ route('show_challenge', array('contest_name' => $challenge->name)) }}">{{ $challenge->name }} > </a>
                <a style="margin-left:-2%;" class="teal-text dashboard-nav-heading" href="{{ route('show_problem', array('problem_id' => $problem->id)) }}">{{ $problem->title }}</a>
              @elseif(Route::currentRouteName() == "show_results")
                <a class="teal-text dashboard-nav-heading" href="{{ route('challenges') }}">Challenges ></a>
                <a style="margin-left:-2%;" class="teal-text dashboard-nav-heading" href="{{ route('show_challenge', array('contest_name' => $challenge->name)) }}">{{ $challenge->name }} ></a>
                <a style="margin-left:-2%;" class="teal-text dashboard-nav-heading" href="{{ route('show_problem', array('problem_id' => $problem->id)) }}">{{ $problem->title }} > </a>
                <a style="margin-left:-2%;" class="teal-text dashboard-nav-heading" href="{{ route('show_results', array('challenge_id' => $challenge->id, 'user_id' => $user->id, 'problem_id' => $problem->id)) }}">Submissions</a>
              @elseif(Route::currentRouteName() == "edit_problems")
                <a class="teal-text dashboard-nav-heading" href="{{ route('challenges') }}">Challenges ></a>
                <a style="margin-left:-2%;" class="teal-text dashboard-nav-heading" href="{{ route('edit_problems', array('contest_name' => $contest->name)) }}">{{ $contest->name }}</a>
              @endif
            </div>
          </nav>
        </div>
      </div>

    </div>


    @yield('content');

    <script>
      $(document).ready(function() {

        // Initialize collapse button
        $(".button-collapse").sideNav();
        // Initialize collapsible (uncomment the line below if you use the dropdown variation)
        //$('.collapsible').collapsible();

      });
    </script>

  </body>
</html>
