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

h1 {
	text-align: center; 
	font-family: Arial, Helvetica, sans-serif; 
}

h2{
	text-align: center; 
	font-family: Arial, Helvetica, sans-serif; 
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
  <li><a class="active" href="search.html">Home</a></li>
  <li><a href="about.html">About</a></li>
  <li><a href="insert.html">Insert</a></li>
  <li><a href="update.html">Update</a></li>
  <li><a href="delete.html">Delete</a></li>
  <li><a href="statistics.html">Statistics</a></li>
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
		$sql = "SELECT * FROM ip WHERE IP_ownerName LIKE '%$keyword%'"; 
	}
	else if($column === "url"){
		$sql = "SELECT * FROM ip WHERE url='$keyword'"; 
	}
	else if($column === "title"){
		$sql = "SELECT * FROM ip WHERE title LIKE '%$keyword%'"; 
	}
	else if($column === "any"){
		$sql = "SELECT * FROM ip WHERE Title LIKE '%$keyword%' OR url='$keyword' OR IP_ownerName LIKE '%$keyword%'";
	}
	
	$result = $conn->query($sql); 
	echo "<h2>Returned '$result->num_rows' results</h2>";
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
	if($keyword == ""){
		$sql = "SELECT * FROM AllCopyright";
	}
	else if($column === "url"){
		$sql = "SELECT * FROM AllCopyright WHERE url = '$keyword'";
	}
	else if($column === "owner"){
		$sql = "SELECT * FROM AllCopyright WHERE IP_ownerName LIKE '%$keyword%'";
	}
	else if($column === "title"){
		$sql = "SELECT * FROM AllCopyright WHERE Title LIKE '%$keyword%'";
	}
	else if($column === "regNum"){
		$sql = "SELECT * FROM AllCopyright WHERE registrationNum = '$keyword'";
	}
	else if($column === "regDate"){
		$sql = "SELECT * FROM AllCopyright WHERE registrationDate = '$keyword'";
	}
	else if($column === "pubDate"){
		$sql = "SELECT * FROM AllCopyright WHERE publicationDate = '$keyword'";
	}
	else if($column === "typeOfWork"){
		$sql = "SELECT * FROM AllCopyright WHERE type = '$keyword'";
	}
	else if($column === "any"){
		$sql = "SELECT * FROM AllCopyright WHERE url = '$keyword' OR IP_ownerName LIKE '%$keyword%' OR Title LIKE '%$keyword%' OR registrationNum = '$keyword' OR registrationDate = '$keyword' OR publicationDate = '$keyword' OR type = '$keyword'";
	}
	
	$result = $conn->query($sql); 
	echo "<h2>Returned '$result->num_rows' results</h2>";
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
	if($keyword === ""){
		$sql = "SELECT * FROM AllTrademark";
	}
	else if($column === "url"){
		$sql = "SELECT * FROM AllTrademark WHERE url = '$keyword'";
	}
	else if($column === "owner"){
		$sql = "SELECT * FROM AllTrademark WHERE IP_ownerName LIKE '%$keyword%'";
	}
	else if($column === "title"){
		$sql = "SELECT * FROM AllTrademark WHERE Title LIKE '%$keyword%'";
	}
	else if($column === "serialNum"){
		$sql = "SELECT * FROM AllTrademark WHERE serialNum = '$keyword'";
	}
	else if($column === "regNum"){
		$sql = "SELECT * FROM AllTrademark WHERE registNum = '$keyword'";
	}
	else if($column === "status"){
		$sql = "SELECT * FROM AllTrademark WHERE status = '$keyword'";
	}
	else if($column === "filingDate"){
		$sql = "SELECT * FROM AllTrademark WHERE filingDate = '$keyword'";
	}
	else if($column === "any"){
		$sql = "SELECT * FROM AllTrademark WHERE url = '$keyword' OR IP_ownerName LIKE '%$keyword%' OR Title LIKE '%$keyword%' OR serialNum = '$keyword' OR registNum = '$keyword' OR status = '$keyword' OR filingDate = '$keyword'";
	}
	
	$result = $conn->query($sql); 
	echo "<h2>Returned '$result->num_rows' results</h2>";
	if ($result->num_rows > 0) {
		echo "<table><tr><th>Owner</th><th>URL</th><th>Title</th><th>Serial #</th><th>Registration #</th><th>Status</th><th>Filing Date</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["IP_ownerName"]. "</td><td>" . $row["url"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["serialNum"]. "</td><td>" . $row["registNum"]. "</td><td>" . $row["status"]. "</td><td>" . $row["filingDate"]. "</td></tr>"; 
		}
		echo "</table>";
	}
	else{
		echo "No results found";
	}
}
else if($table === "patent"){
	if($keyword === ""){
		$sql = "SELECT * FROM AllPatent";   
	}
	else if($column === "url"){
		$sql = "SELECT * FROM AllPatent WHERE url = '$keyword'";
	}
	else if($column === "owner"){
		$sql = "SELECT * FROM AllPatent WHERE IP_ownerName LIKE '%$keyword%'";
	}
	else if($column === "title"){
		$sql = "SELECT * FROM AllPatent WHERE Title LIKE '%$keyword%'";
	}
	else if($column === appNum){
		$sql = "SELECT * FROM AllPatent WHERE appNum = '$keyword'";
	}
	else if($column === patentNum){
		$sql = "SELECT * FROM AllPatent WHERE patentNum = '$keyword'";
	}
	else if($column === filingDate){
		$sql = "SELECT * FROM AllPatent WHERE filingDate = '$keyword'";
	}
	else if($column === issueDate){
		$sql = "SELECT * FROM AllPatent WHERE issueDate = '$keyword'";
	}
	else if($column === "any"){
		$sql = "SELECT * FROM AllPatent WHERE url = '$keyword' OR IP_ownerName LIKE '%$keyword%' OR Title LIKE '%$keyword%' OR appNum = '$keyword' OR patentNum = '$keyword' OR filingDate = '$keyword' OR issueDate = '$keyword'";
	}
	
	$result = $conn->query($sql); 
	echo "<h2>Returned '$result->num_rows' results</h2>";
	if ($result->num_rows > 0) {
		echo "<table><tr><th>Owner</th><th>URL</th><th>Title</th><th>Application #</th><th>Patent #</th><th>Filing Date</th><th>Issue Date</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["IP_ownerName"]. "</td><td>" . $row["url"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["appNum"]. "</td><td>" . $row["patentNum"]. "</td><td>" . $row["filingDate"]. "</td><td>" . $row["issueDate"]. "</td></tr>"; 
		}
		echo "</table>";
	}
	else{
		echo "No results found";
	}
}
else if($table === "youtubevid"){
	if($keyword === ""){
		$sql = "SELECT * FROM AllYoutubeVid";
	}
	else if($colummn === "url"){
		$sql = "SELECT * FROM AllYoutubeVid WHERE url = '$keyword'";
	}
	else if($column === "owner"){
		$sql = "SELECT * FROM AllYoutubeVid WHERE IP_ownerName LIKE '%$keyword%'";
	}
	else if($column === "title"){
		$sql = "SELECT * FROM AllYoutubeVid WHERE Title LIKE '%$keyword%'";
	}
	else if($column === "pubDate"){
		$sql = "SELECT * FROM AllYoutubeVid WHERE publicationDate = '$keyword'";
	}
	else if($column === "any"){
		$sql = "SELECT * FROM AllYoutubeVid WHERE url = '$keyword' OR IP_ownerName LIKE '%$keyword%' OR Title LIKE '%$keyword%' OR publicationDate = '$keyword'";
	}
	
	$result = $conn->query($sql); 
	echo "<h2>Returned '$result->num_rows' results</h2>";
	if ($result->num_rows > 0) {
		echo "<table><tr><th>Owner</th><th>URL</th><th>Title</th><th>Publication Date</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["IP_ownerName"]. "</td><td>" . $row["url"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["publicationDate"]. "</td></tr>"; 
		}
		echo "</table>";
	}
	else{
		echo "No results found";
	}
}
else if($table === "license"){
	if($keyword === ""){
		$sql = "SELECT * FROM AllLicense";
	}
	else if($colummn === "url"){
		$sql = "SELECT * FROM AllLicense WHERE url = '$keyword'";
	}
	else if($column === "owner"){
		$sql = "SELECT * FROM AllLicense WHERE IP_ownerName LIKE '%$keyword'%";
	}
	else if($column === "title"){
		$sql = "SELECT * FROM AllLicense WHERE Title LIKE '%$keyword%'";
	}
	else if($column === "licenseeName"){
		$sql = "SELECT * FROM AllLicense WHERE licenseeName LIKE '%$keyword%'";
	}
	else if($column === "startDate"){
		$sql = "SELECT * FROM AllLicense WHERE startDate = '$keyword'";
	}
	else if($column === "endDate"){
		$sql = "SELECT * FROM AllLicense WHERE endDate = '$keyword'";
	}
	else if($column === "payment"){
		$sql = "SELECT * FROM AllLicense WHERE payment = '$keyword'";
	}
	else if($column === "any"){
		$sql = "SELECT * FROM AllLicense WHERE url = '$keyword' OR IP_ownerName LIKE '%$keyword%' OR Title LIKE '%$keyword%' OR licenseeName LIKE '%$keyword%' OR startDate = '$keyword' OR endDate = '$keyword' OR payment = '$keyword'";
	}
	
	$result = $conn->query($sql); 
	echo "<h2>Returned '$result->num_rows' results</h2>";
	if ($result->num_rows > 0) {
		echo "<table><tr><th>Owner</th><th>URL</th><th>Title</th><th>Licensee</th><th>Start Date</th><th>End Date</th><th>Payment</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["IP_ownerName"]. "</td><td>" . $row["url"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["licenseeName"]. "</td><td>" . $row["startDate"]. "</td><td>" . $row["endDate"]. "</td><td>" . $row["payment"]. "</td></tr>"; 
		}
		echo "</table>";
	}
	else{
		echo "No results found";
	}
}

$conn->close(); 

?>

</body>
</html>