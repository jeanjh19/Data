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
      <link href="./olympics_files/style.css" rel="stylesheet" type="text/css">

<style>
    .coverImage {
      width: 170px;
      height: 170px;
      padding: 10px;
    }

</style>
    </head>

    <body data-gr-c-s-loaded="true" style="">

      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Olympics</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="olympics.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
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


    <h3>ALL OLYMPIC GAMES</h3>
  <br /><br />
  <?php
//defines the 4 variables needed to create a database link
          $host = "localhost";
          $user = "olympics";
          $password = "inf385";
          $database = "olympics";
//creates a link to the MySQL database through the mysqli_connect command
//mysqli_connect command needs the four inputs of the host, username, password, and database name
  $link = mysqli_connect($host, $user, $password, $database);
//MySQL SELECT statement that searches the column in the moreinfo and hostyear tables
//or creates the query and link relationship that will be passed through
  $searchq = "SELECT m.host_city_name AS city
                   , h.hostyear AS year
                   , m.image_link as imagelink
                   , h.game_type_id as gametype_id
                   , h.event_id as eventid
              FROM moreinfo m, hostyear h
              WHERE m.event_id = h.event_id
              ORDER BY h.hostyear desc";
//runs the search query against the database using the mysqli_query command
//mysqli_query command needs the database link and the query that you are using
  $listresult = mysqli_query($link, $searchq);
//print the result
print "<div class='row'>";
//sets a while loop that sets the variable row to the array of results from the query that was run
  while ($row = mysqli_fetch_array($listresult)) {
//connect with the href link to the correspinding info.php
  print "
        <ul class='col-md-4'>
          <div class='card' style='text-align: center'>
            <a href='info.php?eventid=$row[eventid]'>
              <img class='coverImage' src='$row[imagelink]' alt='$row[city] $row[year]'>
              <h3>$row[city] $row[year]</h3>
            </a>
          </div>
        </ul>
      ";

  }
 print " </div>";


  //closes the MySQL link
  mysqli_close($link);

  ?>


     <div align="center">
  	<br /><br />
  	<a class="btn btn-lg btn-primary" href="search.php" role="button">Go Search »</a>
     </div>
    <br /><br /><br>
     </main>

    <footer class="footer">
        <p1>2017 Olympic Group <BR>
         The University of Texas at Austin</p1>
    </footer>


  <!--    ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <!-- add Bootstrap library-->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

      <!-- add JavaScript library-->
      <script src="./olympics_files/app.js"></script>
      <!-- google map javascript api -->

  </body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>
