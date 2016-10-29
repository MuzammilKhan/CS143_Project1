<!-- Using template from http://v4-alpha.getbootstrap.com/examples/cover/# -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Use this if we want an icon for the tab<link rel="icon" href="../../favicon.ico">  -->

    <!-- Tab title: <title>Cover Template for Bootstrap</title> -->

    <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="CSS/cover.css" rel="stylesheet">
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">CS 143: Movie Database</h3>
              <nav class="nav nav-masthead">
                <a class="nav-link active" href="#">Search</a>
                <a class="nav-link" href="#">Add Movie</a>
                <a class="nav-link" href="#">Add Actor</a>
                <a class="nav-link" href="#">Add Comments</a>
                <a class="nav-link" href="#">Add Actor To Movie</a>
                <a class="nav-link" href="#">Add Director To Movie</a>
              </nav>
            </div>
          </div>

          <div class="inner cover">
             <h3 class="cover-heading">Add a movie to database</h3> 
            <!-- <p class="lead">Type what you are looking for in the search box below. Then select whether you are searching for actors or movies</p> -->
             <!-- <p class="lead"> -->
              <!-- Makes a big button: <a href="#" class="btn btn-lg btn-secondary">Learn more</a>  -->
            <!-- </p> -->
          </div>

          <form action="addMovie.php" method="GET">
            <div class="input-group">
              <span class="input-group-addon">Title:</span>
              <input name="title" type="text" class="form-control">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Year:</span>
              <input name="year" type="text" class="form-control"> 
            </div>
            <div class="input-group">    
              <span class="input-group-addon">Company:</span>
              <input name="company" type="text" class="form-control">
            </div>
            <div class="input-group">
              <span class="input-group-addon">MPAA Rating:</span>
              <select name="rating" class="form-control">
                <option value="G">G</option>
                <option value="PG">PG</option>
                <option value="PG-13">PG-13</option>
                <option value="R">R</option>
                <option value="NC-17">NC-17</option>
              </select>
            </div>
            <div class="input-group">     
              <span class="input-group-addon">Movie Genre:</span>
                <input type="checkbox" name="genre[]" value="Action">Action</input>
                <input type="checkbox" name="genre[]" value="Adult">Adult</input>
                <input type="checkbox" name="genre[]" value="Adventure">Adventure</input>
                <input type="checkbox" name="genre[]" value="Animation">Animation</input>
                <input type="checkbox" name="genre[]" value="Comedy">Comedy</input>
                <input type="checkbox" name="genre[]" value="Crime">Crime</input>
                <input type="checkbox" name="genre[]" value="Documentary">Documentary</input>
                <input type="checkbox" name="genre[]" value="Drama">Drama</input>
                <input type="checkbox" name="genre[]" value="Family">Family</input>
                <input type="checkbox" name="genre[]" value="Fantasy">Fantasy</input>
                <input type="checkbox" name="genre[]" value="Horror">Horror</input>
                <input type="checkbox" name="genre[]" value="Musical">Musical</input>
                <input type="checkbox" name="genre[]" value="Mystery">Mystery</input>
                <input type="checkbox" name="genre[]" value="Romance">Romance</input>
                <input type="checkbox" name="genre[]" value="Sci-Fi">Sci-Fi</input>
                <input type="checkbox" name="genre[]" value="Short">Short</input>
                <input type="checkbox" name="genre[]" value="Thriller">Thriller</input>
                <input type="checkbox" name="genre[]" value="War">War</input>
                <input type="checkbox" name="genre[]" value="Western">Western</input>         
            </div>
            <div class="input-group">
              <input type="submit" name="Submit" value="Submit" class="btn btn-success"></input>
            </div>

          </form>

        </div>
         
        </div>


      </div>

    </div>


<?php
  $servername = "localhost";
  $username = "cs143";
  $password = "";
  //$dbname = "CS143"; //USE THIS ONE WHEN SUBMITTING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $dbname = "TEST";

  // Create connection
  $db = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
  } 
  
  if(isset($_GET["Submit"])){
    $title = trim($_GET["title"]);
    $year = trim($_GET["year"]);
    $rating = $_GET["rating"];
    $company = trim($_GET["company"]);
    $genres = $_GET["genre"]; //NEED TO FIGURE OUT THIS PART

     $error = (strlen($title) == 0 || strlen($year) == 0 || strlen($rating) == 0 || strlen($company) == 0 || empty(($genres)));
    if ($error) {
        echo "Did you forget to fill in a field?";
    }
    else {
      echo "Attempting to add... ";
      $sanitized_query = $db->real_escape_string(trim("SELECT MAX(id) FROM MaxMovieID"));
      $maxIDtmp = $db->query($sanitized_query);
      //echo $db->error;// or die(mysqli_error($db));
      echo "1... ";
      $maxIDArr = $maxIDtmp->fetch_array(MYSQLI_NUM);
      $maxID = $maxIDArr[0];
      $newMaxID = $maxID + 1;
      echo $newMaxID;

      $sql = "INSERT INTO Movie (id,title, year, rating, company)
      VALUES ('$newMaxID','$title', '$year', '$rating', '$company')";
      $db->query($sql) or die(mysqli_error($db));
      $db->query("UPDATE MaxMovieID SET id=$newMaxID WHERE id=$maxID");
      echo $db->error;// or die(mysqli_error($db));
      echo "2...";

      foreach($genres as $key => $value){
        $sql2 = "INSERT INTO MovieGenre (mid,genre)
        VALUES ('$newMaxID', '$value')";
        $db->query($sql2);// or die(mysqli_error($db));
      }
           echo $db->error;
           echo "New movie added successfully";
     
    }
    
  }
  

  $db->close();
?>    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="JS/jquery.min.js"> </script>
    <script>window.jQuery || document.write('<script src="JS/jquery.min.js"><\/script>')</script>
    <script src="JS/tether.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
  </body>
</html>
