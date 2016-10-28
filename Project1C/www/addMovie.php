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

          <div class="inner cover">
             <h3 class="cover-heading">Add a movie to database</h3> 
            <!-- <p class="lead">Type what you are looking for in the search box below. Then select whether you are searching for actors or movies</p> -->
             <!-- <p class="lead"> -->
              <!-- Makes a big button: <a href="#" class="btn btn-lg btn-secondary">Learn more</a>  -->
            <!-- </p> -->
          </div>

          <div class="input-group">
            <span class="input-group-addon">Title:</span>
            <input type="title" class="form-control">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Year:</span>
            <input type="year" class="form-control"> 
          </div>
          <div class="input-group">    
            <span class="input-group-addon">Company:</span>
            <input type="company" class="form-control">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Year:</span>
            <input type="year" class="form-control">  
          </div>  
          <div class="input-group">
            <span class="input-group-addon">MPAA Rating:</span>
            <select  class="form-control">
              <option>G</option>
              <option>PG</option>
              <option>PG-13</option>
              <option>R</option>
              <option>NC-17</option>
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
          <button type="add" class="btn btn-success">Add</button>
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
