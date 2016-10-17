<html>			
<head><title>CS143 Project 1B </title></head>
<body>

<p>Type an SQL query in the following box: </p>
Example: <tt>SELECT * FROM Actor WHERE id=10;</tt><br />
<p>
<form action="query.php" method="GET">
<textarea name="query" cols="60" rows="8"></textarea><br />
<input type="submit" value="Submit" />
</form>
</p>
<p><small>Note: tables and fields are case sensitive. All tables in Project 1B are availale.</small>
</p>

<?php 
//$db = new mysqli('localhost', 'cs143', '', 'CS143'); //IMPORTANT: Use this one when done
$db = new mysqli('localhost', 'cs143', '', 'TEST'); //USE THIS FOR TESTING

if($db->connect_errno > 0){ //return error if connection failed
    die('Unable to connect to database [' . $db->connect_error . ']');
}

//get query and apply escapes to special chars
$query = $_GET["query"]; 
$sanitized_query = $db->real_escape_string($query);

//return error if bad query
if (!($rs = $db->query($sanitized_query))){  //Do we want error handling this way?
    $errmsg = $db->error;
    print "Query failed: $errmsg <br />";
    $db->close();
    exit(1);
}
else{
	echo '<h3>Results from MySQL: </h3>';
	echo '<table border="1" cellpadding="1" cellspacing="1">';
	
    echo '<tr align="center">';  //get column names and print them
    while($finfo = $rs->fetch_field()){
    echo '<td><b>',$finfo->name,'</b></td>';  
    }
    echo '</tr>';

    while($row = $rs->fetch_row()) { //get rows of data and print them
	echo '<tr align="center">';
	foreach($row as $key=>$value) {
		echo '<td>',$value,'</td>';
	}
    echo '</tr>';
	}
    echo '</table>';
    $rs->free();

    $db->close();

}
?>



</body>
</html>