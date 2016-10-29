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
                <a class="nav-link" href="#">Search</a>
                <a class="nav-link" href="#">Add Movie</a>
                <a class="nav-link active" href="#">Add Actor</a>
                <a class="nav-link" href="#">Add Comments</a>
                <a class="nav-link" href="#">Add Actor To Movie</a>
                <a class="nav-link" href="#">Add Director To Movie</a>
              </nav>
            </div>
          </div>

          <div class="inner cover">
             <h3 class="cover-heading">Add an actor or director to database</h3> 
            <!-- <p class="lead">Type what you are looking for in the search box below. Then select whether you are searching for actors or movies</p> -->
             <!-- <p class="lead"> -->
              <!-- Makes a big button: <a href="#" class="btn btn-lg btn-secondary">Learn more</a>  -->
            <!-- </p> -->
          </div>

          <form action="addActor.php" method="GET">
            <div class="input-group">
              <span class="input-group-addon">First Name:</span>
              <input name="first" type="text" class="form-control">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Last Name:</span>
              <input name="last" type="text" class="form-control"> 
            </div>
            <div class="input-group">
              <span class="input-group-addon">Sex:</span>
              <select name="sex" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="input-group">    
              <span class="input-group-addon">Date of Birth:</span>
              <input name="dob" type="text" class="form-control">
            </div>
            <div class="input-group">    
              <span class="input-group-addon">Date of Death:</span>
              <input name="dod" type="text" class="form-control">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Actor or Director:</span>
              <select name="role" class="form-control">
                <option value="Actor">Actor</option>
                <option value="Director">Director</option>
              </select>
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
    $first = trim($_GET["first"]);
    $last = trim($_GET["last"]);
    $sex = $_GET["sex"];
    $dob = trim($_GET["dob"]);
    $dod = trim($_GET["dod"]);
    if (strlen($dod) == 0) {
      // if not dead, set value as NULL
      $dod = NULL;
    }
    $role = $_GET["role"];

     $error = (strlen($first) == 0 || strlen($last) == 0 || strlen($dob) == 0 || empty(($sex)) || empty(($role)));
    if ($error) {
        echo "Did you forget to fill in a field?";
    }
    else {
      echo "Attempting to add... ";
      $sanitized_query = $db->real_escape_string(trim("SELECT MAX(id) FROM MaxPersonID"));
      $maxIDtmp = $db->query($sanitized_query);
      //echo $db->error;// or die(mysqli_error($db));
      echo "1... ";
      $maxIDArr = $maxIDtmp->fetch_array(MYSQLI_NUM);
      $maxID = $maxIDArr[0];
      $newMaxID = $maxID + 1;

      $stmnt = $db->prepare("INSERT INTO $role (id, last, first, sex, dob, dod)
          VALUES ('$newMaxID','$last', '$first', '$sex', '$dob', ?)");
      $stmnt->bind_param('s', $dod);
      
      $stmnt->execute();
      $stmnt->close();
      $db->query("UPDATE MaxPersonID SET id=$newMaxID WHERE id=$maxID");
      echo $db->error;// or die(mysqli_error($db));
      echo "2...";

      echo $db->error;
      echo "New person added successfully";
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
