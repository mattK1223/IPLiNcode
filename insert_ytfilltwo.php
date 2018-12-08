<!DOCTYPE html>
<head>

<link rel="stylesheet" href="project.css">

<style>

h2{
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
<html>
<body>

<ul>
  <li><a class="active" href="search.html">Home</a></li>
  <li><a href="about.html">About</a></li>
  <li><a href="insert.html">Insert</a></li>
  <li><a href="update.html">Update</a></li>
  <li><a href="delete.html">Delete</a></li>
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


$url = $_POST['url'];
$owner = $_POST['owner'];
$ownerAddress = $_POST['ownerAddress'];
$title = $_POST['title'];
$pubDate = $_POST['pubDate'];

//check if owner is already in database and insert if not
$sql = "SELECT * FROM owner WHERE name='$owner'";
$result=$conn->query($sql);
if($result->num_rows == 0){
	$sql = "INSERT INTO owner(name,address) VALUES ('$owner','$ownerAddress')";
	$result=$conn->query($sql);
}

//check if ip is already in database and insert if not
$sql = "SELECT * FROM ip WHERE url='$url'";
$result=$conn->query($sql);
if($result->num_rows == 0){
	$sql = "INSERT INTO ip(url,IP_ownerName,Title) VALUES ('$url','$owner','$title')";
	$result=$conn->query($sql);
	echo mysqli_error($conn);
	$id = mysqli_insert_id($conn);
	$sql = "INSERT INTO youtubevideo(id,publicationDate) VALUES ('$id','$pubDate')";
	$result=$conn->query($sql);
	echo mysqli_error($conn);
	echo "<h1>Successful Insertion</h1>";
}
else{
	echo "<h1>Record Already Exists</h1>";
}

?>

</body>
</html>