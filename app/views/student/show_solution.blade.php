@extends('layouts.master')

@section('content')


<div class="container" style="margin-left:25%;">

  <xmp class="prettyprint linenums">
    <?php

      $myfilename = $path;
      if(file_exists($myfilename)){
        echo file_get_contents($myfilename);
      }

    ?>
  </xmp>

</div>

<script>
  $(document).ready(function() {
    prettyPrint();
  });
</script>

@stop
