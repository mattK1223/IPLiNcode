<!DOCTYPE html>
<html>
<head>
<style>
body {
	background-color: lightblue; 
}

/* Nav bar styling begins here */
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
	font-family: Arial, Helvetica, sans-serif;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
/* nav bar styling ends here */

h1 {
	text-align: center; 
	font-family: Arial, Helvetica, sans-serif; 
}

input[type="submit"] {
	background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>

<ul>
  <li><a href="search.html">Home</a></li>
  <li><a href="about.html">About</a></li>
  <li><a href="insert.html">Insert</a></li>
  <li><a href="update.html">Update</a></li>
  <li><a class="active" href="delete.html">Delete</a></li>
  <li><a href="statistics.html">Statistics</a></li>
</ul>

<?php
$servername="localhost";
$username="klopfens";
$password="P0za4TSlbSTSq58v";

//Create a connection
$conn= new mysqli($servername,$username,$password);

//Check connection
if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn,'iplin') or die(mysqli_error());

$table = $_GET["table"];
$keyword = $_GET["keyword"];
$column = $_GET["column"];

if($table === "ip"){
	if($column != "any"){
		$sql = "DELETE FROM '$table' WHERE '$column'='$keyword'";
	}
	else{
		$sql = "DELETE FROM '$table' WHERE IP_ownerName='$keyword' OR Title = '$keyword' OR url='$keyword'";
	}
}

$result = $conn->query($sql); 
echo mysqli_error($conn);
if(mysqli_affected_rows($conn) < 1){
	echo "<h2>Delete Not Successful</h2></br></br>";
}
else{
	echo "<h2>Delete Complete</h2></br></br>";
}

?>

<form action="delete.html">
<center>
	<input type="submit" value="Back">
</center>
</form>

</body>
</html>