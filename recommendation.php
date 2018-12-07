<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="project.css">

<style>

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

<!-- Nav Bar -->
<ul>
  <li><a href="search.html">Home</a></li>
  <li><a href="about.html">About</a></li>
  <li><a href="insert.html">Insert</a></li>
  <li><a href="update.html">Update</a></li>
  <li><a href="delete.html">Delete</a></li>
  <li><a href="statistics.html">Statistics</a></li>
  <li><a class="active" href="recommendation.html">Recommendations</a><li>
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

$table = $_POST["table"];

//ensuring proper capitalization in header
if($table === "ip")
	echo "<h1>Top Ten " . strtoupper($table) . "s</h1>";
else
	echo "<h1>Top Ten " . ucfirst($table) . "s</h1>";

$sql = "SELECT IP_ownerName, Title, url, COUNT(alllicense.id) AS numberOfLicenses FROM alllicense INNER JOIN $table ON $table.id=alllicense.id GROUP BY alllicense.id ORDER BY COUNT(alllicense.id) DESC";
	
$result = $conn->query($sql); 
echo mysqli_error($conn);
if ($result->num_rows > 0) {
	echo "<table border='0'><tr><th>Owner</th><th>Title</th><th>URL</th><th>Number of Licenses</th></tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["IP_ownerName"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["url"]. "</td><td>" . $row["numberOfLicenses"]. "</td></tr>"; 
	}
	echo "</table>";
}
else{
	echo "<h2>No results found</h2>";
}

?>

</body>
</html>