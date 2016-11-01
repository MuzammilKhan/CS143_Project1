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
                    <a class="nav-link" href="search.php">Search</a>
                    <a class="nav-link" href="addMovie.php">Add Movie</a>
                    <a class="nav-link" href="addActor.php">Add Actor</a>
                    <a class="nav-link active" href="addMovieActor.php">Add Actor To Movie</a>
                    <a class="nav-link" href="addMovieDirector.php">Add Director To Movie</a>
                    <a class="nav-link" href="addReview.php">Add Review</a>
                  </nav>
            </div>
              
          </div>

          <div class="inner cover">
             <h3 class="cover-heading">Add a movie and actor relation to database</h3> 
            <!-- <p class="lead">Type what you are looking for in the search box below. Then select whether you are searching for actors or movies</p> -->
             <!-- <p class="lead"> -->
              <!-- Makes a big button: <a href="#" class="btn btn-lg btn-secondary">Learn more</a>  -->
            <!-- </p> -->
          </div>

          <form action="addMovieActor.php" method="GET">
            <?php
              $servername = "localhost";
              $username = "cs143";
              $password = "";
              //$dbname = "CS143"; //USE THIS ONE WHEN SUBMITTING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
              $dbname = "TEST";

              // Create connection
              $db = new mysqli($servername, $username, $password, $dbname);

              if ($db->connect_error) {
                  die("Connection failed: " . $db->connect_error);
              }

              $actor_query = $db->real_escape_string(trim("SELECT id, first, last, dob FROM Actor"));
              $actor_results = $db->query($actor_query);
              $actor_list="";
              while($actor_arr = $actor_results->fetch_array(MYSQLI_ASSOC)) {
                $id = $actor_arr["id"];
                $first = $actor_arr["first"];
                $last = $actor_arr["last"];
                $dob = $actor_arr["dob"];
                $actor_list .= "<option value=\"$id\">".$first." ".$last." (".$dob.")</option>";
              }

              $actor_results->free();

              $movie_query = $db->real_escape_string(trim("SELECT id, title, year FROM Movie"));
              $movie_results = $db->query($movie_query);
              $movie_list="";
              while($movie_arr = $movie_results->fetch_array(MYSQLI_ASSOC)) {
                $id = $movie_arr["id"];
                $title = $movie_arr["title"];
                $year = $movie_arr["year"];
                $movie_list .= "<option value=\"$id\">".$title." (".$year.")</option>";
              }

              $movie_results->free();
            ?>
            <div class="input-group">
              <span class="input-group-addon">Actor:</span>
              <select name="actor" class="form-control">
                <?=$actor_list?>
              </select>
            </div>
            <div class="input-group">
              <span class="input-group-addon">Movie:</span>
              <select name="movie" class="form-control">
                <?=$movie_list?>
              </select>
            </div>
            <div class="input-group">
              <span class="input-group-addon">Role:</span>
              <input name="role" type="text" class="form-control">
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
  
  if(isset($_GET["Submit"])) {
    $aid = $_GET["actor"];
    $mid = $_GET["movie"];
    $role = trim($_GET["role"]);

    $error = (strlen($role) == 0 || empty(($aid)) || empty(($mid)));
    if ($error) {
        echo "Did you forget to fill in a field?";
    }
    else {
      echo "Attempting to add... ";

      $sql = "INSERT INTO MovieActor (mid, aid, role)
          VALUES ('$mid', '$aid', '$role')";
      
      $db->query($sql) or die(mysqli_error($db));

      echo $db->error;// or die(mysqli_error($db)); MAYBE REMOVE
      echo "2...";

      echo $db->error;
      echo "New movie, actor relation added successfully";
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
