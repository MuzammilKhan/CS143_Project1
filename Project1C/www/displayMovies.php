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
                    <a class="nav-link active" href="search.php">Search</a>
                    <a class="nav-link" href="addMovie.php">Add Movie</a>
                    <a class="nav-link" href="addActor.php">Add Actor</a>
                    <a class="nav-link" href="addMovieActor.php">Add Actor To Movie</a>
                    <a class="nav-link" href="addMovieDirector.php">Add Director To Movie</a>
                    <a class="nav-link" href="addReview.php">Add Review</a>
                  </nav>
            </div>
              
          </div>
          <br>
          <div class="inner cover">
             <h3 class="cover-heading">Movie Search Results</h3> 
            <!-- <p class="lead">Type what you are looking for in the search box below. Then select whether you are searching for actors or movies</p> -->
             <!-- <p class="lead"> -->
              <!-- Makes a big button: <a href="#" class="btn btn-lg btn-secondary">Learn more</a>  -->
            <!-- </p> -->

            <div>
              <?php
                $search = $_GET["search"];
                $operation = $_GET["operation"];

                if (!empty(($search))) {
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

                  $tokens = preg_split('/\s+/', $search);

                  $sql_query = "SELECT id, title, year FROM Movie WHERE (title LIKE '%$tokens[0]%')";
                  unset($tokens[0]);

                  foreach ($tokens as $token) {
                   $sql_query .= " AND (title LIKE '%$token%')";
                  }

                  $sanitized_query = $sql_query;//$db->real_escape_string($sql_query);
                  $query_results = $db->query($sanitized_query);

                  while ($row = $query_results->fetch_array(MYSQLI_ASSOC)) {
                    $id = $row["id"];
                    $title = $row["title"];
                    $year = $row["year"];
                    echo "<a href=MovieInfo.php?id=".$id.">".$title." (".$year.")</a><br>";
                  }

                  $query_results->free();
                  $db->close();
                }

              ?>
            </div>
          </div>

        </div>
         
        </div>


      </div>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="JS/jquery.min.js"> </script>
    <script>window.jQuery || document.write('<script src="JS/jquery.min.js"><\/script>')</script>
    <script src="JS/tether.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
  </body>
</html>
