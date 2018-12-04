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
$copyrightType=$_GET["copyrightType"];
$ownerN       =$_GET["ownerName"];
$ownerA       =$_GET["ownerAddress"]; 
$URL          =$_GET["URL"];
$Title        =$_GET["Title"];
$regNum       =$_GET["registrationNum"];
$regDate      =$_GET["registrationDate"];
$workType     =$_GET["type"];
$appNum       =$_GET["appNum"];
$patentNum    =$_GET["patentNum"];
$issueDate    =$_GET["issueDate"];
$abstract     =$_GET["abstract"];
$serialNum    =$_GET["serialNum"];
$registNum    =$_GET["registNum"];
$status       =$_GET["status"];
$filingDate   =$_GET["filingDate"];
$pubDate      =$_GET["publicationDate"];

if($copyrightType === "copyright"){
	if ( $ownerA === "" ) {
		$ownerA = NULL; }
	if ( $regNum === "" ) {
		$regNum = NULL; }
	if ( $regDate === "" ) {
		$regDate = NULL; }
	if ( $pubDate === "" ) {
		$pubDate= NULL; }
	if ( $workType === "" ) {
		$workType= NULL; }
		
	$sql1 = "INSERT INTO ip (url, IP_ownerName,Title) VALUES ('$URL', '$ownerN','$Title')";
	$sql2 = "INSERT INTO owner ( name, address ) VALUES ('$ownerN', '$ownerA')";
	$sql3 = "INSERT INTO copyright ( registrationNum, registrationDate, publicationDate, type ) VALUES ('$regNum','$regDate','$pubDate','$workType')";

	if  ( $conn->query($sql1) === TRUE ) {}
	else {
		echo("Error inserting into IP table");
	}
		
	if  ( $conn->query($sql2) === TRUE ) {}
	else {
		echo("Error inserting into IP table");
	}
		
	if  ( $conn->query($sql3) === TRUE ) {}
	else {
		echo ("Error inserting into IP table");
	}
	
	echo("Successful insertion into table!");
}
else if($copyrightType === "trademark"){
	
}
else if($table === "patent"){
	echo "trademark";
}
else if($table === "youtubevideo"){
	echo "patent";
}

$conn->close(); 
?>

</body>
</html>