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

          <div>
              <div class="inner">
                <h3 class="masthead-brand">CS 143: Movie Database</h3>
                  <nav class="nav nav-masthead">
                    <a class="nav-link" href="search.php">Search</a>
                    <a class="nav-link" href="addMovie.php">Add Movie</a>
                    <a class="nav-link" href="addActor.php">Add Actor</a>
                    <a class="nav-link" href="addMovieActor.php">Add Actor To Movie</a>
                    <a class="nav-link" href="addMovieDirector.php">Add Director To Movie</a>
                    <a class="nav-link" href="addReview.php">Add Review</a>
                  </nav>
              </div>
          </div>

          <!-- <div class="inner cover">
            <h1 class="cover-heading">Search!</h1>
             <p class="lead">Type what you are looking for in the search box below. Then select whether you are searching for actors or movies</p> 
             <p class="lead"> 
               Makes a big button: <a href="#" class="btn btn-lg btn-secondary">Learn more</a>  
             </p> 
          </div> -->

          <script type="text/javascript">
            function onSubmitForm()
            {
              if(document.myform.operation[0].checked == true)
              {
                document.myform.action ="displayActors.php";
              }
              else
              if(document.myform.operation[1].checked == true)
              {
                document.myform.action ="displayMovies.php";
              }
              return true;
            }
          </script>

          <form name="myform" onsubmit="return onSubmitForm();" method="GET">
            <div class="input-group-lg">
              <input type="radio" name="operation" value="actor" checked>Actor
              <input type="radio" name="operation" value="movie">Movie
              <input name="search" type="text" class="form-control" placeholder="Enter here" >
              <span class="input-group-btn"><button type="submit" class="btn btn-info" type="button">Search</button></span>
            </div>
          </form>
          <div class="mastfoot">
            <div class="inner">
              <p>Made by Muzammil Khan and Saad Syed </a>.</p>
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
