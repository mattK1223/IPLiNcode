<!DOCTYPE html>
<html>
<head>
<style>

body{
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

h1{
	text-align: center; 
}

table, th, td {
    border: 1px solid black; 
}

table{
	margin-left: auto;
	margin-right: auto; 
}

th, td {
	word-wrap: break-word; 
	max-width: 250px; 
}

</style>
</head>
<body>

<ul>
  <li><a href="search.html">Home</a></li>
  <li><a href="about.html">About</a></li>
  <li><a href="insert.html">Insert</a></li>
</ul>

<h1>Results</h1>

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

$keyword=$_GET["keyword"];
$table=$_GET["table"];
$column=$_GET["column"]; 


if($table === "all"){
	if($keyword === ""){
		$sql = "SELECT * FROM ip";
	}
	else if($column === "owner"){
		$sql = "SELECT * FROM ip WHERE IP_ownerName='$keyword'"; 
	}
	else if($column === "url"){
		$sql = "SELECT * FROM ip WHERE url='$keyword'"; 
	}
	else if($column === "title"){
		$sql = "SELECT * FROM ip WHERE title='$keyword'"; 
	}
	else if($column === "any"){
		$sql = "SELECT * FROM ip WHERE Title='$keyword' OR url='$keyword' OR IP_ownerName='$keyword'";
	}
	
	$result = $conn->query($sql); 
	
	if ($result->num_rows > 0) {
		echo "<table><tr><th>Owner</th><th>URL</th><th>Title</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["IP_ownerName"]. "</td><td>" . $row["url"]. "</td><td>" . $row["Title"]. "</td></tr>"; 
		}
		echo "</table>";
	}
	else{
		echo "No results found"; 
	}
}
else if($table === "copyright"){
	$newView = "CREATE VIEW allCp AS SELECT * FROM copyright INNER JOIN ip ON copyright.url=ip.url"; 
	$conn->query($newView);
	if($keyword == ""){
		$sql = "SELECT * FROM allCp";
	}
	
	$result = $conn->query($sql); 
	
	if ($result->num_rows > 0) {
		echo "<table><tr><th>Owner</th><th>URL</th><th>Title</th><th>Registration #</th><th>Registration Date</th><th>Publication Date</th><th>Type</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["IP_ownerName"]. "</td><td>" . $row["url"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["registrationNum"]. "</td><td>" . $row["registrationDate"]. "</td><td>" . $row["publicationDate"]. "</td><td>" . $row["type"]. "</td></tr>"; 
		}
		echo "</table>";
	}
	else{
		echo "No results found";
	}
}
else if($table === "trademark"){
	echo "trademark";
}
else if($table === "patent"){
	echo "patent";
}
else if($table === "youtubevid"){
	
}



$conn->close(); 

?>

</body>
</html>