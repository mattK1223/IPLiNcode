<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="project.css">
	<style>
		h2 {
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
  <li><a class="active" href="update.html">Update</a></li>
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


$id = $_GET["id"];
$url = $_GET["url"];
$owner = $_GET["owner"];
$title = $_GET["title"];
$regNum = $_GET["regNum"];
$regDate = $_GET["regDate"];
$pubDate = $_GET["pubDate"];
$type = $_GET["type"];

$sql = "UPDATE ip SET url='$url', IP_ownerName='$owner', Title='$title' WHERE id='$id'";
$result = $conn->query($sql);

$sql = "UPDATE copyright SET registrationNum='$regNum', registrationDate='$regDate',publicationDate='$pubDate',type='$type' WHERE id='$id'";
$result = $conn->query($sql);
echo "<h2>Update Complete</h2></br></br>"

?>

<form action="update.html">
<center>
	<input type="submit" value="Back">
</center>
</form>

</body>
</html>