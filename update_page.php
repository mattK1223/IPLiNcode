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

$table = $_GET["table"];
$url = $_GET["url"];


if($table === "copyright"){
	//check if record is in table
	$sql = "SELECT * FROM AllCopyright WHERE url = '$url'";
	$result = $conn->query($sql);
	if($result->num_rows == 0){
		echo "<h1>Record Not Found</h1>";
	}
	else{
		echo "<h1>Update Copyright</h1>";
		$row = $result->fetch_assoc();
		$id = $row["id"];
		$owner = $row["IP_ownerName"];
		$title = $row["Title"];
		$regNum = $row["registrationNum"];
		$regDate = $row["registrationDate"];
		$pubDate = $row["publicationDate"];
		$type = $row["type"];
		echo "<form action='update_result_copyright.php'><center><table>";
		echo "<input type='hidden' name='id' value='$id' />";
		echo "<tr><td><label value='url'>URL:</label></td><td><input type='text' id='url' name='url' value='$url'/></td></tr>";
		echo "<tr><td><label value='owner'>Owner:</label></td><td><input type='text' id='owner' name='owner' value = '$owner'/></td></tr>";
		echo "<tr><td><label value='title'>Title:</label></td><td><input type='text' id='title' name='title' value='$title'/></td></tr>";
		echo "<tr><td><label value='regNum'>Registration #:</label></td><td><input type='text' id='regNum' name='regNum' value='$regNum'/></td></tr>";
		echo "<tr><td><label value='regDate'>Registration Date:</label></td><td><input type='text' id='regDate' name='regDate' value='$regDate'/></td></tr>";
		echo "<tr><td><label value='pubDate'>Publication Date:</label></td><td><input type='text' id='pubDate' name='pubDate' value = '$pubDate'/></td></tr>";
		echo "<tr><td><label value='type'>Type of Work:</label></td><td><input type='text' id='type' name='type' value = '$type'/></td></tr>";
		echo "</table></br></br><input type='submit' value='Update'>";
		echo "</center></form>";
	}
}
else if($table === "trademark"){
	$sql = "SELECT * FROM AllTrademark WHERE url = '$url'";
	$result = $conn->query($sql);
	if($result->num_rows == 0){
		echo "<h1>Record Not Found</h1>";
	}
	else{
		echo "<h1>Update Trademark</h1>";
		$row = $result->fetch_assoc();
		$id = $row["id"];
		$owner = $row["IP_ownerName"];
		$title = $row["Title"];
		$serialNum = $row["serialNum"];
		$registNum = $row["registNum"];
		$status = $row["status"];
		$filingDate = $row["filingDate"];
		echo "<form action='update_result_trademark.php'><center><table>";
		echo "<input type='hidden' name='id' value='$id' />";
		echo "<tr><td><label value='url'>URL:</label></td><td><input type='text' id='url' name='url' value='$url'/></td></tr>";
		echo "<tr><td><label value='owner'>Owner:</label></td><td><input type='text' id='owner' name='owner' value = '$owner'/></td></tr>";
		echo "<tr><td><label value='title'>Title:</label></td><td><input type='text' id='title' name='title' value='$title'/></td></tr>";
		echo "<tr><td><label value='serialNum'>Serial #:</label></td><td><input type='text' id='serialNum' name='serialNum' value='$serialNum'/></td></tr>";
		echo "<tr><td><label value='registNum'>Registration #:</label></td><td><input type='text' id='registNum' name='registNum' value='$registNum'/></td></tr>";
		echo "<tr><td><label value='status'>Status:</label></td><td><input type='text' id='status' name='status' value = '$status'/></td></tr>";
		echo "<tr><td><label value='filingDate'>Filing Date:</label></td><td><input type='text' id='filingDate' name='filingDate' value = '$filingDate'/></td></tr>";
		echo "</table></br></br><input type='submit' value='Update'>";
		echo "</center></form>";
	}
}
else if($table === "patent"){
	$sql = "SELECT * FROM AllPatent WHERE url = '$url'";
	$result = $conn->query($sql);
	if($result->num_rows == 0){
		echo "<h1>Record Not Found</h1>";
	}
	else{
		echo "<h1>Update Patent</h1>";
		$row = $result->fetch_assoc();
		$id = $row["id"];
		$owner = $row["IP_ownerName"];
		$title = $row["Title"];
		$appNum = $row["appNum"];
		$patentNum = $row["patentNum"];
		$filingDate = $row["filingDate"];
		$issueDate = $row["issueDate"];
		$abstract = $row["abstract"];
		echo "<form action='update_result_patent.php'><center><table>";
		echo "<input type='hidden' name='id' value='$id' />";
		echo "<tr><td><label value='url'>URL:</label></td><td><input type='text' id='url' name='url' value='$url'/></td></tr>";
		echo "<tr><td><label value='owner'>Owner:</label></td><td><input type='text' id='owner' name='owner' value = '$owner'/></td></tr>";
		echo "<tr><td><label value='title'>Title:</label></td><td><input type='text' id='title' name='title' value='$title'/></td></tr>";
		echo "<tr><td><label value='appNum'>Application #:</label></td><td><input type='text' id='appNum' name='appNum' value='$appNum'/></td></tr>";
		echo "<tr><td><label value='patentNum'>Patent #:</label></td><td><input type='text' id='patentNum' name='patentNum' value='$patentNum'/></td></tr>";
		echo "<tr><td><label value='filingDate'>Filing Date:</label></td><td><input type='text' id='filingDate' name='filingDate' value = '$filingDate'/></td></tr>";
		echo "<tr><td><label value='issueDate'>Issue Date:</label></td><td><input type='text' id='issueDate' name='issueDate' value = '$issueDate'/></td></tr>";
		echo "<tr><td><label value='abstract'>Abstract:</label></td><td><input type='text' id='abstract' name='abstract' value = '$abstract'/></td></tr>";
		echo "</table></br></br><input type='submit' value='Update'>";
		echo "</center></form>";
	}
}
else if($table === "youtubevid"){
	$sql = "SELECT * FROM AllYoutubeVid WHERE url = '$url'";
	$result = $conn->query($sql);
	if($result->num_rows == 0){
		echo "<h1>Record Not Found</h1>";
	}
	else{
		echo "<h1>Update Youtube Video</h1>";
		$row = $result->fetch_assoc();
		$id = $row["id"];
		$owner = $row["IP_ownerName"];
		$title = $row["Title"];
		$pubDate = $row["publicationDate"];
		echo "<form action='update_result_youtubevid.php'><center><table>";
		echo "<input type = 'hidden' name = 'id' value = '$id' />";
		echo "<tr><td><label value='url'>URL:</label></td><td><input type='text' id='url' name='url' value='$url'/></td></tr>";
		echo "<tr><td><label value='owner'>Owner:</label></td><td><input type='text' id='owner' name='owner' value = '$owner'/></td></tr>";
		echo "<tr><td><label value='title'>Title:</label></td><td><input type='text' id='title' name='title' value='$title'/></td></tr>";
		echo "<tr><td><label value='pubDate'>Publication Date:</label></td><td><input type='text' id='pubDate' name='pubDate' value='$pubDate'/></td></tr>";
		echo "</table></br></br><input type='submit' value='Update'>";
		echo "</center></form>";
	}
}

?>

</body>
</html>