<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Student Project Tacker</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="/bower/bootstrap/dist/css/bootstrap.min.css">

  <!-- Custom styles for this template -->
  <link href="/css/app.css" rel="stylesheet">
</head>


<body>

  @include('layouts.nav')

  

  <div class="container">

    <div class="row">
      @yield('content') 
      
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  @include('layouts.footer')


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="/bower/jquery/dist/jquery.slim.min.js"></script>
  <script src="/bower/tether/dist/js/tether.min.js"></script>
  <script src="/bower/bootstrap/dist/js/bootstrap.min.js"></script>


</body>

</html>