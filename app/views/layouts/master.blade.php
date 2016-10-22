<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Online Judge</title>


    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>

    <!-- Custom CSS -->
    <link href="../assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <!-- Animate CSS -->
    <link rel="stylesheet" href="../assets/css/animate.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    <!-- Important Scripts -->
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../assets/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/init.js"></script>


  </head>


  <body class="dashboard-body">


    <div class="row">

      <div class="col s3 dashboard-left">
        <ul id="slide-out" class="side-nav fixed" style="background-color:#2e3d49;">

          <li class="dashboard-logo"><a id="logo-container" href="{{ URL::route('dashboard') }}" class="brand-logo orange-text">C{ }DE</a></li>

          <div class="dashboard-top-options">
            <li><a href="{{ URL::route('dashboard') }}" class="grey-text text-lighten-1"><i class="medium material-icons teal-text text-darken-2" style="margin-right:20%;">person</i>Home</a></li>
            <li><a href="{{ URL::route('challenges') }}" class="grey-text text-lighten-1"><i class="medium material-icons teal-text text-darken-2" style="margin-right:20%;">code</i>Challenges</a></li>
          </div>

          <div class="dashboard-bottom-options">
            <li><a  href="#!" class="grey-text text-lighten-1"><i class="medium material-icons teal-text text-darken-2" style="margin-right:20%;">settings</i>Settings</a></li>
            <li><a  href="{{ URL::route('logout') }}" class="grey-text text-lighten-1"><i class="medium material-icons teal-text text-darken-2"  style="margin-right:20%;">flight</i>Logout</a></li>
          </div>

        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>

      <div class="col s9" style="margin-left:-3%;">
        <div class="navbar-fixed">
          <nav class="dashboard-nav white">
            <div class="nav-wrapper">
              @if(Route::currentRouteName() == "instructor_dashboard")
                <h5 class="grey-text text-darken-2 dashboard-nav-heading">Home</h5>
              @elseif(Route::currentRouteName() == "challenges")
                <h5 class="grey-text text-darken-2 dashboard-nav-heading">Challenges</h5>
              @elseif(Route::currentRouteName() == "settings")
                <h5 class="grey-text text-darken-2 dashboard-nav-heading">Settings</h5>
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