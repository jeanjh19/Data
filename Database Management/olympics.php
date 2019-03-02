<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com">
  <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Olympics</title>

    <!-- Bootstrap core CSS -->
    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="./olympics_files/style.css" rel="stylesheet">
    <style type="text/css">
      body{
        min-height: 85rem;
      }
    </style>
  </head>

  <body data-gr-c-s-loaded="true" style="">
  <!--create a navbar-->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Olympics</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <!-- connet the home page olympics.php with browse.php, search.php, and About.php-->
            <a class="nav-link" href="olympics.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="browse.php">Browse</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search.php">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
       </ul>
  </div>
    </nav>

    <main role="main" class="container">
<br /><br />
<div align="center">
	<h1>Upcoming: The Olympic Winter Games</h1>
        <!--insert image from website-->
        <img src="https://stillimg.olympic.org/games/280x280/2018_2.png?interpolation=lanczos-none&resize=240:240">
	<br /><br />
  <!--connect the info.php where gameyear=2018&gametype=2-->
	<a class="btn btn-lg btn-primary" href="info.php?eventid=1" role="button">View Details »</a>
<br /><br /><br />
  </div>

<div id="map" class="container"></div>

    <footer class="footer" style="bottom: 0;">
        <p1>2017 Olympic Group <BR>
          The University of Texas at Austin</p1>
    </footer>
    </main>

<!--    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- add Bootstrap library-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <!-- add JavaScript library-->
    <script src="./olympics_files/app.js"></script>
    <!-- insert google map javascript api -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIdJV0Vo0NsydI892fmiSMUnWTECPAIjQ&callback=initMap" type="text/javascript">
    </script>
</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>
