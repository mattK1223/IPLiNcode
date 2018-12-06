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

h2 {
	text-align: center; 
	font-family: Arial, Helvetica, sans-serif; 
}

h3 {
	text-align: center; 
	font-family: Arial, Helvetica, sans-serif; 
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
	if($column === "IP_ownerName"){
		$sql = "DELETE FROM ip WHERE IP_ownerName='$keyword'"; 
	}
	else if($column === "url"){
		$sql = "DELETE FROM ip WHERE url='$keyword'"; 
	}
	else if($column === "Title"){
		$sql = "DELETE FROM ip WHERE Title='$keyword'"; 
	}
	else if($column === "any"){
		$sql = "DELETE FROM ip WHERE Title='$keyword' OR url='$keyword' OR IP_ownerName='$keyword'";
	}
	
	$result = $conn->query($sql); 
	
	$numDel = mysqli_affected_rows($conn);
	if($numDel > 0){
		echo "<h2>Delete Successful</h2>";
	}
	else{
		echo "<h2>Delete Successful</h2>";
		echo "<h3>'$numDel' Records Deleted</h3>";
	}
}
else if($table === "copyright"){
	if($column === "url"){
		$sql = "DELETE FROM copyright WHERE id = (SELECT id FROM ip WHERE url='$keyword')";
	}
	else if($column === "IP_ownerName"){
		$sql = "DELETE FROM copyright WHERE id = (SELECT id FROM ip WHERE IP_ownerName='$keyword')";
	}
	else if($column === "Title"){
		$sql = "DELETE FROM copyright WHERE id = (SELECT id FROM ip WHERE Title='$keyword')";
	}
	else if($column === "registrationNum"){
		$sql = "DELETE FROM copyright WHERE registrationNum='$keyword'";
	}
	else if($column === "registrationDate"){
		$sql = "DELETE FROM copyright WHERE registrationDate='$keyword'";
	}
	else if($column === "publicationDate"){
		$sql = "DELETE FROM copyright WHERE publicationDate='$keyword'";
	}
	else if($column === "type"){
		$sql = "DELETE FROM copyright WHERE type='$keyword'";
	}
	else if($column === "any"){
		$sql = "DELETE FROM copyright WHERE id = (SELECT id FROM ip WHERE url='$keyword') OR id = (SELECT id FROM ip WHERE IP_ownerName='$keyword') OR id = (SELECT id FROM ip WHERE Title='$keyword') OR registrationNum='$keyword' OR registrationDate='$keyword' OR publicationDate='$keyword' OR type='$keyword'";
	}
	
	$result = $conn->query($sql); 
	
	$numDel = mysqli_affected_rows($conn);
	if($numDel > 0){
		echo "<h2>Delete Successful</h2>";
		echo "<h3>'$numDel' Records Deleted</h3>";
	}
	else{
		echo "<h2>Delete Failed</h2>";
	}
}
else if($table === "trademark"){
	if($column === "url"){
		$sql = "DELETE FROM trademark WHERE id = (SELECT id FROM ip WHERE url='$keyword')";
	}
	else if($column === "IP_ownerName"){
		$sql = "DELETE FROM trademark WHERE id = (SELECT id FROM ip WHERE IP_ownerName='$keyword')";
	}
	else if($column === "Title"){
		$sql = "DELETE FROM trademark WHERE id = (SELECT id FROM ip WHERE Title='$keyword')";
	}
	else if($column === "serialNum"){
		$sql = "DELETE FROM trademark WHERE serialNum='$keyword'";
	}
	else if($column === "registNum"){
		$sql = "DELETE FROM trademark WHERE registNum='$keyword'";
	}
	else if($column === "status"){
		$sql = "DELETE FROM trademark WHERE status='$keyword'";
	}
	else if($column === "filingDate"){
		$sql = "DELETE FROM trademark WHERE filingDate='$keyword'";
	}
	else if($column === "any"){
		$sql = "DELETE FROM trademark WHERE id = (SELECT id FROM ip WHERE url='$keyword') OR id = (SELECT id FROM ip WHERE IP_ownerName='$keyword') OR id = (SELECT id FROM ip WHERE Title='$keyword') OR serialNum='$keyword' OR registNum='$keyword' OR status='$keyword' OR filingDate='$keyword'";
	}
	
	$result = $conn->query($sql); 
	
	$numDel = mysqli_affected_rows($conn);
	if($numDel > 0){
		echo "<h2>Delete Successful</h2>";
		echo "<h3>'$numDel' Records Deleted</h3>";
	}
	else{
		echo "<h2>Delete Failed</h2>";
	}
}
else if($table === "patent"){
	if($column === "url"){
		$sql = "DELETE FROM patent WHERE id = (SELECT id FROM ip WHERE url='$keyword')";
	}
	else if($column === "IP_ownerName"){
		$sql = "DELETE FROM patent WHERE id = (SELECT id FROM ip WHERE IP_ownerName='$keyword')";
	}
	else if($column === "Title"){
		$sql = "DELETE FROM patent WHERE id = (SELECT id FROM ip WHERE Title='$keyword')";
	}
	else if($column === "appNum"){
		$sql = "DELETE FROM patent WHERE appNum='$keyword'";
	}
	else if($column === "patentNum"){
		$sql = "DELETE FROM patent WHERE patentNum='$keyword'";
	}
	else if($column === "filingDate"){
		$sql = "DELETE FROM patent WHERE filingDate='$keyword'";
	}
	else if($column === "issueDate"){
		$sql = "DELETE FROM patent WHERE issueDate='$keyword'";
	}
	else if($column === "abstract"){
		$sql = "DELETE FROM patent WHERE abstract='$keyword'";
	}
	else if($column === "any"){
		$sql = "DELETE FROM patent WHERE id = (SELECT id FROM ip WHERE url='$keyword') OR id = (SELECT id FROM ip WHERE IP_ownerName='$keyword') OR id = (SELECT id FROM ip WHERE Title='$keyword') OR appNum='$keyword' OR patentNum='$keyword' OR filingDate='$keyword' OR issueDate='$keyword' OR abstract='$keyword'";
	}
	
	$result = $conn->query($sql); 
	
	$numDel = mysqli_affected_rows($conn);
	if($numDel > 0){
		echo "<h2>Delete Successful</h2>";
		echo "<h3>'$numDel' Records Deleted</h3>";
	}
	else{
		echo "<h2>Delete Failed</h2>";
	}
}
else if($table === "youtubevid"){
	if($column === "url"){
		$sql = "DELETE FROM youtubevid WHERE id = (SELECT id FROM ip WHERE url='$keyword')";
	}
	else if($column === "IP_ownerName"){
		$sql = "DELETE FROM youtubevid WHERE id = (SELECT id FROM ip WHERE IP_ownerName='$keyword')";
	}
	else if($column === "Title"){
		$sql = "DELETE FROM youtubevid WHERE id = (SELECT id FROM ip WHERE Title='$keyword')";
	}
	else if($column === "publicationDate"){
		$sql = "DELETE FROM youtubevid WHERE publicationDate='$keyword'";
	}
	else if($column === "any"){
		$sql = "DELETE FROM youtubevid WHERE id = (SELECT id FROM ip WHERE url='$keyword') OR id = (SELECT id FROM ip WHERE IP_ownerName='$keyword') OR id = (SELECT id FROM ip WHERE Title='$keyword') OR publicationDate='$keyword'";
	}
	
	$result=$conn->query($sql);

	$numDel = mysqli_affected_rows($conn);
	if($numDel > 0){
		echo "<h2>Delete Successful</h2>";
		echo "<h3>'$numDel' Records Deleted</h3>";
	}
	else{
		echo "<h2>Delete Failed</h2>";
	}
}
	
?>
</br></br>
<form action="delete.html">
<center>
	<input type="submit" value="Back">
</center>
</form>

</body>
</html>