<?php
function is_valid_equation($eqn){
	if(preg_match('/^[^\d\.\+\-\*\/]+/', $eqn)) { //check for invalid chars
		return false;
	} else if(preg_match('/[\+\*\/]{2,}/', $eqn) || preg_match('/-{3,}/', $eqn) || preg_match('/^[\+\*\/]/', $eqn) || preg_match('/[\d]*-*[\+\*\/]+[^\d\-]/', $eqn) || preg_match('/^[\+\*\/]+[\d]/', $eqn) || preg_match('/^[\-]{2,}[\d]/', $eqn) || preg_match('/^[\-]+[^\d\-]/', $eqn)  || preg_match('/[\+\-\*\/]+$/', $eqn) || preg_match('/[-][\+\*\/]/', $eqn)) { 
	//check for invalid repetitions of operators, operators at beginning of line, and operators not followed by digits
		return false;
	} else if (preg_match('/[^\d]+\.+[^\d]+/', $eqn) || preg_match('/[\d]*\.+[^\d]+/', $eqn) || preg_match('/[^\d]+\.+[\d]*/', $eqn)) { 
	//check for '.' between operators and '.' not between digits
		return false;
	} else {
		return true;
	}
	}

function divide_by_zero($eqn){
	if(preg_match('/\/0/', $eqn)){
		return true;
	} else {
		return false;
	}
	}

?>


<html>
<head><title>Calculator</title></head>
<body>

<h1>Calculator</h1>
(By Muzammil Khan and Saad Syed)<br />
Type an expression in the following box (e.g., 10.5+20*3/25).

<p>
	<form action="calculator.php" method="GET">
		<input type="text" name="expr">
		<input type="submit" value="Calculate">
	</form>
</p>

<ul>
    <li>Only numbers and +,-,* and / operators are allowed in the expression.
    <li>The evaluation follows the standard operator precedence.
    <li>The calculator does not support parentheses.
    <li>The calculator handles invalid input "gracefully". It does not output PHP error messages.
</ul>

Here are some(but not limit to) reasonable test cases:
<ol>
  <li> A basic arithmetic operation:  3+4*5=23 </li>
  <li> An expression with floating point or negative sign : -3.2+2*4-1/3 = 4.46666666667, 3*-2.1*2 = -12.6 </li>
  <li> Some typos inside operation (e.g. alphabetic letter): Invalid input expression 2d4+1 </li>
</ol>

<?php
$expr = $_GET['expr'];
if(preg_match('/[\d]+ +[\d]+/', $expr)){ //check for spaces between digits
	echo "<h2>Result</h2>";
	echo "<br>Invalid Expression!</br>";
	return false;
}
$eqn = str_replace(' ', '', $expr); //remove all spaces for easier regex checking

if(!is_valid_equation($eqn)){
	echo "<h2>Result</h2>";
	echo "<br>Invalid Expression!</br>";
} else if(divide_by_zero($eqn)){
	echo "<h2>Result</h2>";
	echo "<br>Division by zero error!</br>";
} else if ($eqn == ''){
} else {
	$tmp = str_replace('--', '- -', $eqn); //eval gets confused if you have --
	$result = eval('return '.$tmp.';');
	echo "<h2>Result</h2>";
	echo "<br> $eqn = $result </br>";
}





?>

</body>
</html>