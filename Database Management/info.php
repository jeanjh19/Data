<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com">
  <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>More Information</title>

    <!-- Bootstrap core CSS -->
    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="./olympics_files/style.css" rel="stylesheet">

    <style>

     td, th {
     text-align: center;
     padding: 10px;}


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
   <div align="center">
   <br />

<?php
//defines the 4 variables needed to create a database link
  $host = "localhost";
  $user = "olympics";
  $password = "inf385";
  $database = "olympics";
//creates a link to the MySQL database through the mysqli_connect command
//mysqli_connect command needs the four inputs of the host, username, password, and database name
$link = mysqli_connect($host, $user, $password, $database);
//defines the variable eventid as the global variable
//this variable was passed from the browse page $eventid = $_GET['eventid'];
  $eventid = $_GET['eventid'];
//MySQL SELECT statement which takes the column titles from the tables moreinfo, hostyear, country, and gametype
//also creates the relationship among the tables by linking id numbers
  $searchq = "SELECT m.host_city_name as city
                   , h.hostyear as year
                   , m.image_link as imagelink
                   , m.info_link as link
                   , c.country as country
                   , g.name as gametype
                   , m.medalimagelink as medalimagelink
              FROM moreinfo m
              inner join hostyear h on h.event_id = m.event_id
              inner JOIN country c on c.country_id = h.country_id
              inner join gametype g on g.game_type_id = h.game_type_id
              WHERE m.event_id = $eventid";
//creates the query and link relationship that will be passed through
  $listresult = mysqli_query($link, $searchq);
//creates the variable row and assigns it to the array formed from the MySQL query
  $row = mysqli_fetch_array($listresult);
//print the result
  print "<img src = $row[imagelink] width='200px' height='200px'><br />";
  print "The $row[year] olympic Game was hosted by $row[city].<br /><br />";
  print "<h2> General Information: </h2>";
  print "<p>Game Type: $row[gametype]</p>";
  print "<p>Country: $row[country]</p>";
  print "<p>City: $row[city]</p>";
  print "<p>Year: $row[year]</p>";
  // print "<p>$row[posterinfo] </p>";
  print "<img src = '$row[medalimagelink]'><br />";

//show the Top 10 Winning Countries through MySQL SELECT statement which takes the column titles from the tables medalcount,country
  $query = "SELECT c.country as country
                   , mc.gold_medal as gold
                   , mc.silver_medal as silver
                   , mc.bronze_medal as bronze
              FROM medalcount mc
              inner JOIN country c on c.country_id = mc.country_id
              WHERE mc.event_id = $eventid";
//creates the query and link relationship that will be passed through
  $listresult2 = mysqli_query($link, $query);
//print the result
if ($eventid > 1){
  print "<h2>Top 10 Winning Countries</h2>";
  print "<table>
        <tr>
          <th>Country</th>
          <th>Gold</th>
          <th>Silver</th>
          <th>Bronze</th>
        </tr>";
//sets a while loop that sets the variable row to the array of results from the query that was run
    while ($row_country = mysqli_fetch_array($listresult2)) {
    print "<tr><td>$row_country[country]</td>
               <td>$row_country[gold]</td>
               <td>$row_country[silver]</td>
               <td>$row_country[bronze]</td></tr>";
    }
  print "</table></br>";
}


//print moreinfo link to other website
  print "<a href='$row[link]'>See here for more information</a><br /><br />";

//close the MySQL link
  mysqli_close($link);
?>


   <a class="btn btn-lg btn-primary" href="browse.php" role="button">Go Back »</a>
   </div>
   </main>
   <br><br>
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIdJV0Vo0NsydI892fmiSMUnWTECPAIjQ&callback=initMap" type="text/javascript">
    </script>


</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>
