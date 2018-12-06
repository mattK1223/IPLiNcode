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

$licensee = $_GET['licensee'];
$url = $_GET['url'];

$sql = "SELECT * FROM AllLicense WHERE licenseeName = '$licensee' AND License_id = (SELECT id FROM ip WHERE url='$url')";
$result = $conn->query($sql);
if($result->num_rows == 0){
	echo "<h1>Record Not Found</h1>";
}
else{
	echo "<h1>Update License</h1>";
	$row = $result->fetch_assoc();
	$id = $row["id"];
	$url = $row["url"];
	$licenseeName = $row["licenseeName"];
	$endDate = $row["endDate"];
	$startDate = $row["startDate"];
	$payment = $row["payment"];
	echo "<form action='update_result_license.php'><center><table>";
	echo "<input type='hidden' name='id' value='$id' />";
	echo "<tr><td><label value='url'>IP URL:</label></td><td><input type='text' disabled='disabled' id='url' name='url' value='$url'/></td></tr>";
	echo "<tr><td><label value='licenseeName'>Licensee:</label></td><td><input type='text' id='licenseeName' name='licenseeName' value = '$licenseeName'/></td></tr>";
	echo "<tr><td><label value='startDate'>Start Date:</label></td><td><input type='text' id='startDate' name='startDate' value='$startDate'/></td></tr>";
	echo "<tr><td><label value='endDate'>End Date:</label></td><td><input type='text' id='endDate' name='endDate' value='$endDate'/></td></tr>";
	echo "<tr><td><label value='payment'>Payment:</label></td><td><input type='text' id='payment' name='payment' value='$payment'/></td></tr>";
	echo "</table></br></br><input type='submit' value='Update'>";
	echo "</center></form>";
}

?>

</body>
<html>
