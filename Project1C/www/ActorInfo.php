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

    <style>
      table, th, td {
        text-align: left;
      }
    </style>
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div>
            <div class="inner">
              
                <h3 class="masthead-brand">CS 143: Movie Database</h3>
                  <nav class="nav nav-masthead">
                    <a class="nav-link" href="search.php">Search</a>
                    <a class="nav-link" href="addMovie.php">Add Movie</a>
                    <a class="nav-link active" href="addReview.php">Add Review</a>
                    <a class="nav-link" href="addActor.php">Add Actor/Director</a>
                    <a class="nav-link" href="addMovieActor.php">Add Actor To Movie</a>
                    <a class="nav-link" href="addMovieDirector.php">Add Director To Movie</a>
                  </nav>
            </div>
              
          </div>
          
          <br>
          <div class="inner cover">
             <h3 class="cover-heading">Actor Search Results</h3> 
            <!-- <p class="lead">Type what you are looking for in the search box below. Then select whether you are searching for actors or movies</p> -->
             <!-- <p class="lead"> -->
              <!-- Makes a big button: <a href="#" class="btn btn-lg btn-secondary">Learn more</a>  -->
            <!-- </p> -->

            <div>
              <?php
                $id = $_GET["id"];

                if (!empty(($id))) {
                  $servername = "localhost";
                  $username = "cs143";
                  $password = "";
                  $dbname = "CS143"; //USE THIS ONE WHEN SUBMITTING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

                  // Create connection
                  $db = new mysqli($servername, $username, $password, $dbname);
                  // Check connection
                  if ($db->connect_error) {
                      die("Connection failed: " . $db->connect_error);
                  }

                  $sql_query = "SELECT * FROM Actor WHERE id=".$id;

                  $sanitized_query = $sql_query;//$db->real_escape_string($sql_query);
                  $query_results = $db->query($sanitized_query);

	              	$row = $query_results->fetch_array(MYSQLI_ASSOC); 
	                $id = $row["id"];
	                $last = $row["last"];
	                $first= $row["first"];
	                $sex = $row["sex"];
	                $dob = $row["dob"];
	                $dod = $row["dod"];
	                $query_results->free();


	                echo "<table style=\"width:100%\"><tr>";
	                echo "<th>Name</th><th>Sex</th><th>Date of Birth</th><th>Date of Death</th></tr>";
	                echo "<tr><td>$first $last</td><td>$sex</td><td>$dob</td><td>$dod</td></table><br>";


                  	echo "<table style=\"width:100%\"><tr><th>Movie Title</th><th>Role</th></tr>";
	                $sql_query = "SELECT * FROM MovieActor WHERE aid=".$id;
	                $query_results = $db->query($sql_query);
	                while ($row = $query_results->fetch_array(MYSQLI_ASSOC)) {
	                  $mid = $row["mid"];
	                  $role = $row["role"];
	                  $sql_query1 = "SELECT title, year FROM Movie WHERE id=".$mid;
	                  $query_results1 = $db->query($sql_query1);
	                  $row2 = $query_results1->fetch_array(MYSQLI_ASSOC); 
	                  $title = $row2["title"];
	                  $year = $row2["year"];
	                  //if(empty($dod)){$dod = "";}
	                  echo "<tr><td><a href=MovieInfo.php?id=".$mid.">".$title." ($year)</a></td>";
	                  echo "<td>$role</td></tr>";
	                  $query_results1->free();
	                }
	                echo "</table>";
	                $query_results->free(); 



                  $db->close();
                }

              ?>
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
