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
                    <a class="nav-link" href="addMovieActor.php">Add Actor To Movie</a><br>
                    <a class="nav-link" href="addMovieDirector.php">Add Director To Movie</a>
                    <a class="nav-link active" href="addReview.php">Add Review</a>
                  </nav>
            </div>
              
          </div>

          <div class="inner cover">
             <h3 class="cover-heading">Add a movie review to database</h3> 
            <!-- <p class="lead">Type what you are looking for in the search box below. Then select whether you are searching for directors or movies</p> -->
             <!-- <p class="lead"> -->
              <!-- Makes a big button: <a href="#" class="btn btn-lg btn-secondary">Learn more</a>  -->
            <!-- </p> -->
          </div>

          <form action="addReview.php" method="GET">
            <?php
              $servername = "localhost";
              $username = "cs143";
              $password = "";
              $dbname = "CS143"; //USE THIS ONE WHEN SUBMITTING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

              // Create connection
              $db = new mysqli($servername, $username, $password, $dbname);

              if ($db->connect_error) {
                  die("Connection failed: " . $db->connect_error);
              }

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
              <span class="input-group-addon">Your Name:</span>
              <input name="name" type="text" class="form-control">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Movie Title:</span>
              <select name="movie" class="form-control">
                <?=$movie_list?>
              </select>
            </div>
            <div class="input-group">
              <span class="input-group-addon">Your Rating:</span>
              <select name="rating" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>                                                
              </select>
            </div>
            <div class="input-group">
              <span class="input-group-addon"> <textarea name="comment" maxlength="500" rows="5" placeholder="500 characters max" class="form-control"></textarea></span>
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
  if(isset($_GET["Submit"])) {
     $mid = $_GET["movie"];
     $name = $_GET["name"];
     $rating = $_GET["rating"];
     $comment = $_GET["comment"];
    

    $error = (empty($mid) || empty($name) || empty($rating) || strlen($comment) == 0 );
    if ($error) {
        echo "Did you forget to fill in a field?";
    }
    else {
      echo "Attempting to add... ";

      $sql = "INSERT INTO Review (name, time, mid, rating, comment)
            VALUES ('$name' , NOW() , '$mid', '$rating', '$comment')";
      
      $db->query($sql) or die(mysqli_error($db));

      echo $db->error;// or die(mysqli_error($db)); MAYBE REMOVE

      echo $db->error;
      echo "New movie review added successfully";
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
