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
