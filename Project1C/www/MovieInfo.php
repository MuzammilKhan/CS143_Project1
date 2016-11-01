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
                    <a class="nav-link active" href="search.php">Search</a>
                    <a class="nav-link" href="addMovie.php">Add Movie</a>
                    <a class="nav-link" href="addReview.php">Add Review</a>
                    <a class="nav-link" href="addActor.php">Add Actor/Director</a>
                    <a class="nav-link" href="addMovieActor.php">Add Actor To Movie</a>
                    <a class="nav-link" href="addMovieDirector.php">Add Director To Movie</a>
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

                  $sql_query = "SELECT * FROM Movie WHERE id=".$id;

                  $sanitized_query = $sql_query;//$db->real_escape_string($sql_query);
                  $query_results = $db->query($sanitized_query);

                  $row = $query_results->fetch_array(MYSQLI_ASSOC); 
                  $title = $row["title"];
                  $year = $row["year"];
                  $rating= $row["rating"];
                  $company = $row["company"];
                  $query_results->free();
                  echo "Title: ".$title."<br>";
                  echo "Year: ".$year."<br>";
                  echo "MPAA Rating: ".$rating."<br>";
                  echo "Producer: ".$company."<br>";

                  //get genres
                  echo "Genres:<br>"; 
                  $sql_query2 = "SELECT * FROM MovieGenre WHERE mid=".$id;
                  $query_results2 = $db->query($sql_query2); 
                  while ($row = $query_results2->fetch_array(MYSQLI_ASSOC)) {
                    $genre = $row["genre"];
                    echo $genre."<br>";
                  } 
                  $query_results2->free(); 

                  //get director
                  echo "Director:<br>"; 
                  $sql_query3 = "SELECT * FROM MovieDirector WHERE mid=".$id;
                  $query_results3 = $db->query($sql_query3);
                  while ($row = $query_results3->fetch_array(MYSQLI_ASSOC)) {
                    $did = $row["did"];
                    $sql_query31 = "SELECT * FROM Director WHERE id=".$did;
                    $query_results31 = $db->query($sql_query31);
                    $row2 = $query_results31->fetch_array(MYSQLI_ASSOC); 
                    $first = $row2["first"];
                    $last = $row2["last"];
                    $dob = $row2["dob"];
                    $dod = $row2["dod"];
                    //if(empty($dod)){$dod = "";}
                    echo $first." ".$last." (".$dob." - ".$dod.")<br>";
                    $query_results31->free();
                  }
                  $query_results3->free();

                  echo "<table style=\"width:100%\"><tr><th>Actor</th><th>Role</th></tr>";
                  $sql_query4 = "SELECT * FROM MovieActor WHERE mid=".$id;
                  $query_results4 = $db->query($sql_query4);
                  while ($row = $query_results4->fetch_array(MYSQLI_ASSOC)) {
                    $aid = $row["aid"];
                    $role = $row["role"];
                    $sql_query41 = "SELECT * FROM Actor WHERE id=".$aid;
                    $query_results41 = $db->query($sql_query41);
                    $row2 = $query_results41->fetch_array(MYSQLI_ASSOC); 
                    $first = $row2["first"];
                    $last = $row2["last"];
                    $dob = $row2["dob"];
                    $dod = $row2["dod"];
                    //if(empty($dod)){$dod = "";}
                    echo "<tr><td><a href=ActorInfo.php?id=".$aid.">".$first." ".$last." (".$dob." - ".$dod.")</a></td>";
                    echo "<td>$role</td></tr>";
                    $query_results41->free();
                  }
                  echo "</table>";
                  $query_results4->free(); 
                 
                  //get reviews
                  echo "<br>Reviews:<br>"; 
                   $sql_query5 = "SELECT * FROM Review WHERE mid=".$id;
                  $query_results5 = $db->query($sql_query5);
                  while ($row = $query_results5->fetch_array(MYSQLI_ASSOC)) {
                    $name = $row["name"];
                    $time = $row["time"];
                    $rating= $row["rating"];
                    $comment= $row["comment"];
                    echo $name." ".$time."<br>Rating: ".$rating."<br>".$comment."<br>"."<br>";
                  }
                  $query_results5->free(); 



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
