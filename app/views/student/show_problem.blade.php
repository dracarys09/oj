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

    <hr>

    <!-- Disqus section -->
    <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = '//cs699project.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


  </div>

@stop
