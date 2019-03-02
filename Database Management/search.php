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
          <li class="nav-item">
            <a class="nav-link" href="browse.php">Browse</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="search.php">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
<!-- <li class="nav-item dropdown">

          </li>  -->

       </ul>

  </div>
    </nav>

<main role="main" class="container">
     <br />
      <div style="opacity: 0.6">
         <h2>SEARCH</h2>
         <p>Search for Olympic Games with the filters. Try different filters for different selections. Click the links to learn more about the games.</p>
      </div>

<br />

  <div class="row">
    <div class="col-md-5">
    <!--create a text box for searching keyword-->
    <p>Search by Keyword (country,continent,and game type): </p>
     <form method = "GET" action = "search.php">
        <input class="form-control margin" style="width: 25rem" type="text" placeholder="Search" aria-label="Search" name = "keywordsearch">
        <input class="btn btn-outline-success margin" type="submit" value="Search">
      </form>
<br>

<!--create a selection box for search by country-->
<p>Search by Country: </p>
  <form action = "search.php" method = "GET">
    <select name = "countrysearch" class="form-control margin" style="width: 18rem">
      <option value = "1">Australia</option>
      <option value = "2">Australia Sweden</option>
      <option value = "3">Austria</option>
      <option value = "4">Belgium</option>
      <option value = "5">Brazil</option>
      <option value = "6">Bulgaria</option>
      <option value = "7">Canada</option>
      <option value = "8">China</option>
      <option value = "9">Cuba</option>
      <option value = "10">Czechoslovakia</option>
      <option value = "11">Denmark</option>
      <option value = "12">East Germany</option>
      <option value = "13">Empire of Japan</option>
      <option value = "14">Empire of Japan Finland</option>
      <option value = "15">Empire of Japan Nazi Germany</option>
      <option value = "16">Finland</option>
      <option value = "17">France</option>
      <option value = "18">Germany</option>
      <option value = "19">Great Britain</option>
      <option value = "20">Greece</option>
      <option value = "21">Hungary</option>
      <option value = "22">Italy</option>
      <option value = "23">Japan</option>
      <option value = "24">Korea</option>
      <option value = "25">Mexico</option>
      <option value = "26">Mixed Team</option>
      <option value = "27">Nazi Germany</option>
      <option value = "28">Netherlands</option>
      <option value = "29">New Zealand</option>
      <option value = "30">Norway</option>
      <option value = "31">Poland</option>
      <option value = "32">Romania</option>
      <option value = "33">Russia</option>
      <option value = "34">Russian Federation</option>
      <option value = "35">South Africa</option>
      <option value = "36">South Korea </option>
      <option value = "37">Soviet Union</option>
      <option value = "38">Spain</option>
      <option value = "39">Sweden</option>
      <option value = "40">Switzerland</option>
      <option value = "41">Turkey</option>
      <option value = "42">Ukraine</option>
      <option value = "43">Unified Team (ex USSR)</option>
      <option value = "44">United Kingdom</option>
      <option value = "45">United States</option>
      <option value = "46">United Team of Germany</option>
      <option value = "47">USA</option>
      <option value = "48">USSR</option>
      <option value = "49">West Germany</option>
      <option value = "50">Yugoslavia</option>
      <input class="btn btn-outline-success margin" type="submit" value="Search">
    </select><br /><br />
  </form>
<!--create a selection box for search by continent-->
  <p>Search by Continent: </p>
    <form action = "search.php" method = "GET">
      <select name = "continent" class="form-control margin" style="width: 10rem">
          <option value = "1">Asia</option>
          <option value = "2">South Amercia</option>
          <option value = "3">North Amercia</option>
          <option value = "4">Africa</option>
          <option value = "5">Europe</option>
          <option value = "9">Oceania Europe</option>
          <option value = "6">Antarctica</option>
          <option value = "7">Oceania</option>
          <option value = "8">Eurasia</option>
          <option value = "10">Mixed</option>
          <input class="btn btn-outline-success margin" type="submit" value="Search">
        </select><br /><br />
      </form>
<!--create a selection box for search by game type-->
  <p>Search by Game Type: </p>
 <form method="GET" action="search.php">
  <select name = "gameType" class="form-control margin" style="width: 10rem">
      <option value = "1">Summer Games</option>
      <option value = "2">Winter Games</option>
          <input class="btn btn-outline-success margin" type="submit" value="Search">
        </select>
  </form>
   <br /><br />
  <a class="btn btn-lg btn-primary" href="browse.php" role="button">Browse All »</a>
<br><br>
</div>

<div class="col-md-7">
<?php
//defines the 4 variables needed to create a database link
        $host = "localhost";
        $user = "olympics";
        $password = "inf385";
        $database = "olympics";
//creates a link to the MySQL database through the mysqli_connect command
//mysqli_connect command needs the four inputs of the host, username, password, and database name
$link = mysqli_connect($host, $user, $password, $database);
//sets an if isset loop to check if there is anything present in the selection box of the form for gameType
if (isset($_GET['gameType'])) {
//assigns the variable $gameType to the global variable search passed from the slection box of the form
$gameType = $_GET['gameType'];
//sanities the search variable
$gameType = preg_replace("/[^ 0-9]+/", "", $gameType);
//MySQL SELECT statement that searches the column in the gametype,country, and hostyear tables where the gameType variable appears
//or creates the query and link relationship that will be passed through
$searchq = "SELECT hostyear.hostyear as Year
                 , hostyear.event_id as eventid
                 , country.country as Country
                 , gametype.name as GameType
            FROM gametype, country, hostyear
            WHERE gametype.game_type_id = $gameType
            AND hostyear.game_type_id = gametype.game_type_id
            AND country.country_id = hostyear.country_id";
//runs the search query against the database using the mysqli_query command
//mysqli_query command needs the database link and the query that you are using
$listresult = mysqli_query($link, $searchq);
//printing the results
print "<h5>Here are your results:<br /></h5>";
//sets a while loop that sets the variable row to the array of results from the query that was run
while ($row = mysqli_fetch_array($listresult)) {
//add a href link to connect with info.php
  print "<a href='info.php?eventid=$row[eventid]'>
         The $row[Year] $row[GameType] game was hosted by $row[Country].</a> <br />";

}
}


//sets an if isset loop to check if there is anything present in the selection box of the form for continent
if (isset($_GET['continent'])) {
//assigns the variable $continent to the global variable search passed from the slection box of the form
$continent = $_GET['continent'];
//sanities the search variable
$continent = preg_replace("/[^ 0-9]+/", "", $continent);
//MySQL SELECT statement that searches the column in the gametype,country, continent,and hostyear tables where the continent variable appears
//or creates the query and link relationship that will be passed through
$searchq = "SELECT continent.name as Continent
                 , country.country as Country
                 , hostyear.hostyear as Year
                 , hostyear.event_id as eventid
                 , gametype.name as GameType
            FROM  country, continent,hostyear,gametype
            WHERE continent.continent_id = $continent
            AND continent.continent_id = country.continent_id
            AND hostyear.game_type_id = gametype.game_type_id
            AND hostyear.country_id = country.country_id";
//runs the search query against the database using the mysqli_query command
//mysqli_query command needs the database link and the query that you are using
$listresult = mysqli_query($link, $searchq);
//printing the results
print "<h5>Here are your results:<br /></h5>";
//sets a while loop that sets the variable row to the array of results from the query that was run
while ($row = mysqli_fetch_array($listresult)) {
//add a href link to connect with info.php
  print "<a href='info.php?eventid=$row[eventid]'>
         The $row[Year] $row[GameType] game was hosted by $row[Country] in $row[Continent].</a> <br />";
}
}


//sets an if isset loop to check if there is anything present in the selection box of the form for countrysearch
if (isset($_GET['countrysearch'])) {
//assigns the variable $countrysearch to the global variable search passed from the slection box of the form
$countrysearch = $_GET['countrysearch'];
//sanities the search variable
$countrysearch = preg_replace("/[^ 0-9a-zA-Z]+/", "", $countrysearch);
//MySQL SELECT statement that searches the column in the gametype,country,continent,and hostyear tables where the countrysearch variable appears
//or creates the query and link relationship that will be passed through
$countrysearchq = "SELECT continent.name as Continent
                 , country.country as Country
                 , hostyear.hostyear as Year
                 , hostyear.event_id as eventid
                 , gametype.name as GameType
            FROM  country, continent,hostyear,gametype
            WHERE country.country_id = $countrysearch
            AND continent.continent_id = country.continent_id
            AND hostyear.game_type_id = gametype.game_type_id
            AND hostyear.country_id = country.country_id";
//runs the search query against the database using the mysqli_query command
//mysqli_query command needs the database link and the query that you are using
$listresult = mysqli_query($link, $countrysearchq);
//printing the results
print "<h5>Here are your results:<br /></h5>";
//sets a while loop that sets the variable row to the array of results from the query that was run
while ($row = mysqli_fetch_array($listresult)) {
//add a href link to connect with info.php
  print "<a href='info.php?eventid=$row[eventid]'>
         The $row[Year] $row[GameType] game was hosted by $row[Country] in $row[Continent].</a>  <br />";

}
}

//sets an if isset loop to check if there is anything present in the text box of the form for keywordsearch
if (isset($_GET['keywordsearch'])) {
//assigns the variable $keywordsearch to the global variable search passed from the text box of the form
$keywordsearch = $_GET['keywordsearch'];
//sanities the search variable
$keywordsearch = preg_replace("/[^ 0-9a-zA-Z]+/", "", $keywordsearch);
//MySQL SELECT statement that searches the column in the gametype,country,continent,and hostyear tables where the keywordsearch variable appears
//or creates the query and link relationship that will be passed through
$keywordsearchq = "SELECT Distinct continent.name as Continent
                 , country.country as Country
                 , hostyear.hostyear as Year
                 , hostyear.event_id as eventid
                 , gametype.name as GameType
            FROM  country,continent,hostyear,gametype
            WHERE continent.continent_id = country.continent_id
            AND hostyear.game_type_id = gametype.game_type_id
            AND hostyear.country_id = country.country_id
            AND (country.country LIKE '%$keywordsearch%'
            OR continent.name LIKE '%$keywordsearch%'
            OR gametype.name LIKE '%$keywordsearch%')";
//runs the search query against the database using the mysqli_query command
//mysqli_query command needs the database link and the query that you are using
$listresult = mysqli_query($link, $keywordsearchq);
//printing the results
print "<h5>Here are your results:<br /></h5>";
//sets a while loop that sets the variable row to the array of results from the query that was run
while ($row = mysqli_fetch_array($listresult)) {
//add a href link to connect with info.php
  print "<a href='info.php?eventid=$row[eventid]'>
         The $row[Year] $row[GameType] game was hosted by $row[Country] in $row[Continent].</a> <br />";
}
}


//closes the MySQL link
mysqli_close($link);

?>
</div>
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


</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>
