<!-- Used w3 schools example heavily to create sidebar: http://www.w3schools.com/howto/howto_js_sidenav.asp -->
<!DOCTYPE html>
<html>
<style>
body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav h1{
    color: #f1f1f1;
    font-size: 28px;
    text-indent: 30px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#"><h3>Search</h3></a>
  <h1>Add:</h1>
  <a href="#">Actor</a>
  <a href="#">Movie</a>
  <a href="#">Comments</a>
  <a href="#">Actor to movie</a>
  <a href="#">Director to movie</a>
</div>

<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
    <h1>Add Movie </h1>
    <p>Please fill in the desired fields below then press the submit button.</p>
    <form action="addMovie.php" method="GET">
      Title:<br>
      <input name="Title" style="width: 300px;"><br>
      Year:<br>
      <input name="Year" style="width: 300px;"><br>
      Company:<br>
      <input name="Company" style="width: 300px;"><br>
      MPAA Rating:<br>
      <select id = "MovieRating"> <!-- Do we want to allow no rating aka null as a value? -->
        <option value="G" selected>G</option>
        <option value="PG">PG</option>
        <option value="PG-13">PG-13</option>
        <option value="R">R</option>
        <option value="NC-17">NC-17</option>
      </select><br>
      Genres:<br> <!-- Check if these are all the genres or if there are less or extra here. Do we want to restrict this? -->
      <input type="checkbox" name ="Action" Action<br>
      <input type="checkbox" name ="Adult" Adult<br>
      <input type="checkbox" name ="Adventure" Adventure<br>
      <input type="checkbox" name ="Animation" Animation<br>
      <input type="checkbox" name ="Comedy" Comedy<br>
      <input type="checkbox" name ="Crime" Crime<br>
      <input type="checkbox" name ="Documentary" Documentary<br>
      <input type="checkbox" name ="Drama" Drama<br>
      <input type="checkbox" name ="Family" Family<br>
      <input type="checkbox" name ="Fantasy" Fantasy<br>
      <input type="checkbox" name ="Horror" Horror<br>
      <input type="checkbox" name ="Musical" Musical<br>
      <input type="checkbox" name ="Mystery" Mystery<br>
      <input type="checkbox" name ="Romance" Romance<br>
      <input type="checkbox" name ="Sci-Fi" Sci-Fi<br>
      <input type="checkbox" name ="Short" Short<br>
      <input type="checkbox" name ="Thriller" Thriller<br>
      <input type="checkbox" name ="War" War<br>
      <input type="checkbox" name ="Western" Western<br>
      <input type="submit" value="Submit" />
    </form>

</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
</script>
     
</body>
</html>

