 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="project.css">
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
  <li><a class="active" href="insert.html">Insert</a></li>
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
$licenseName  =$_GET["LiName"];
$startDate    =$_GET["Listart"];
$endDate      =$_GET["LiEnd"];
$payment      =$_GET["LiPay"];
if($copyrightType === "copyright"){
	if ( $ownerA === "" ) {
		$ownerA = 'NULL'; }
	if ( $regNum === "" ) {
		$regNum = 'NULL'; }
	if ( $regDate === "" ) {
		$regDate = 'NULL'; }
	if ( $pubDate === "" ) {
		$pubDate= 'NULL'; }
	if ( $workType === "" ) {
		$workType= 'NULL'; }
		
	$sql1 = "INSERT INTO ip (url, IP_ownerName,Title) VALUES ('$URL', '$ownerN','$Title')";
	$sql2 = "INSERT INTO owner ( name, address ) VALUES ('$ownerN', '$ownerA')";
	$sql4 = "SELECT name FROM owner WHERE name = '$ownerN'";
	$result = $conn->query($sql4);
	if  ( $conn->query($sql2) === TRUE || $result->num_rows > 0 ) 
	{
		if  ( $conn->query($sql1) === TRUE ) {
			$new_id = mysqli_insert_id($conn);
			$sql3 = "INSERT INTO copyright ( id, registrationNum, registrationDate, publicationDate, type ) VALUES ('$new_id', '$regNum','$regDate','$pubDate','$workType')";
			if  ( $conn->query($sql3) === TRUE ) {
					echo("Successful insertion into table!");
			}
				else {
					echo ("Error inserting into copyright table" . mysqli_error($conn));
				}
		
		}
			else {
				echo("Error inserting into IP table" . mysqli_error($conn));
			}
	}
	else {
		echo("Error inserting into owner table" . mysqli_error($conn));
	}	


}
else if($copyrightType === "trademark"){
	if ( $serialNum === "" ) {
		$serialNum= 'NULL'; }
	if ($registNum === "" ) {
		$registNum='NULL'; }
	if ( $status === "" ) {
		$status= 'NULL'; }
	if ( $filingDate === "" ) {
		$filingDate= 'NULL'; }
	if ( $ownerA === "" ) {
		$ownerA = 'NULL'; }	

	$sql1 = "INSERT INTO ip (url, IP_ownerName,Title) VALUES ('$URL', '$ownerN','$Title')";
	$sql2 = "INSERT INTO owner ( name, address ) VALUES ('$ownerN', '$ownerA')";
	$sql4 = "SELECT name FROM owner WHERE name = '$ownerN'";
	$result = $conn->query($sql4);
	if  ( $conn->query($sql2) === TRUE || $result->num_rows > 0 ) {
		if  ( $conn->query($sql1) === TRUE ) {
			$new_id = mysqli_insert_id($conn);
			$sql3 = "INSERT INTO trademark ( id, serialNum, registNum, status, filingDate ) VALUES ('$new_id', '$serialNum','$registNum','$status','$filingDate')";
			if  ( $conn->query($sql3) === TRUE ) {
					echo("Successful insertion into table!");
			}
				else {
					echo ("Error inserting into trademark table" . mysqli_error($conn));
				}
	
		}
			else {
				echo("Error inserting into IP table" . mysqli_error($conn));
			}
	}
	else {
		echo("Error inserting into owner table" . mysqli_error($conn));
	}	

}
else if($copyrightType === "patent"){
	if ( $ownerA === "" ) {
		$ownerA = 'NULL'; }
	if ( $appNum === "" ) {
		$appNum = 'NULL'; }		
	if ( $patentNum === "" ) {
		$patentNum = 'NULL'; }
	if ( $filingDate === "" ) {
		$filingDate = 'NULL'; }
	if ( $issueDate === "" ) {
		$issueDate = 'NULL'; }
	if ( $abstract === "" ) {
		$abstract = 'NULL'; }

	$sql1 = "INSERT INTO ip (url, IP_ownerName,Title) VALUES ('$URL', '$ownerN','$Title')";
	$sql2 = "INSERT INTO owner ( name, address ) VALUES ('$ownerN', '$ownerA')";
	$sql4 = "SELECT name FROM owner WHERE name = '$ownerN'";
	$result = $conn->query($sql4);
	if  ( $conn->query($sql2) === TRUE || $result->num_rows > 0) {
		if  ( $conn->query($sql1) === TRUE ) {
			$new_id = mysqli_insert_id($conn);
			$sql3 = "INSERT INTO patent ( id, appNum, patentNum, filingDate, issueDate, abstract ) VALUES ('$new_id', '$appNum','$patentNum','$filingDate','$issueDate','$abstract')";
			if  ( $conn->query($sql3) === TRUE ) {
					echo("Successful insertion into table!");
			}
				else {
					echo ("Error inserting into patent table" . mysqli_error($conn));
				}
	
		}
			else {
				echo("Error inserting into IP table" . mysqli_error($conn));
			}
	}
	else {
		echo("Error inserting into owner table" . mysqli_error($conn));
	}	


}
else if($copyrightType === "youtubevideo"){
	if ( $ownerA === "" ) {
		$ownerA = 'NULL'; }
	if ( $pubDate === "" ) {
		$pubDate = 'NULL'; }

	$sql1 = "INSERT INTO ip (url, IP_ownerName,Title) VALUES ('$URL', '$ownerN','$Title')";
	$sql2 = "INSERT INTO owner ( name, address ) VALUES ('$ownerN', '$ownerA')";
	$sql4 = "SELECT name FROM owner WHERE name = '$ownerN'";
	$result = $conn->query($sql4);
	if  ( $conn->query($sql2) === TRUE || $result->num_rows > 0 ) {
		if  ( $conn->query($sql1) === TRUE ) {
			$new_id = mysqli_insert_id($conn);
			$sql3 = "INSERT INTO youtubevideo ( id, publicationDate ) VALUES ('$new_id','$pubDate')";
			if  ( $conn->query($sql3) === TRUE ) {	echo("Successful insertion into table!");}
				else {
					echo ("Error inserting into youtubevideo table" . mysqli_error($conn));
				}
	
		}
			else {
				echo("Error inserting into IP table" . mysqli_error($conn));
			}
	}
	else {
		echo("Error inserting into owner table" . mysqli_error($conn));
	}	


}
else if($copyrightType === "license"){
	if ( $ownerA === "" ) {
		$ownerA = 'NULL'; }
	if ( $startDate == "" ) {
		$startDate = 'NULL'; }
	if ( $endDate == "" ) {
		$endDate = 'NULL'; }
	if ( $payment == "" ) {
		$payment = 'NULL'; }

	$sql1 = "INSERT INTO ip (url, IP_ownerName,Title) VALUES ('$URL', '$ownerN','$Title')";
	$sql2 = "INSERT INTO owner ( name, address ) VALUES ('$ownerN', '$ownerA')";
	$sql4 = "SELECT name FROM owner WHERE name = '$ownerN'";
	$sql5 = "SELECT id FROM ip WHERE url = '$URL'";
	$result = $conn->query($sql4);
	$result2 = $conn->query($sql5);
	 
	if ( $conn->query($sql2) === TRUE || $result->num_rows > 0 || $result2->num_rows > 0) {
		if ( $result2->num_rows > 0 ) {
			$row = $result2->fetch_assoc();
			$new_id = $row["id"];	
			$sql3 = "INSERT INTO license ( licenseeName, License_id, startDate, endDate, payment) VALUES ('$licenseName','$new_id', '$startDate', '$endDate', '$payment')";
			if  ( $conn->query($sql3) === TRUE ) {	echo("Successful insertion into table!");}
				else {
					echo ("Error inserting into license table" . mysqli_error($conn));
				}
		}		
		else if  ( $conn->query($sql1) === TRUE ) {
			$new_id = mysqli_insert_id($conn);
			$sql3 = "INSERT INTO license ( licenseeName, License_id, startDate, endDate, payment) VALUES ('$licenseName','$new_id', '$startDate', '$endDate', '$payment')";
			if  ( $conn->query($sql3) === TRUE ) {	echo("Successful insertion into table!");}
				else {
					echo ("Error inserting into license table" . mysqli_error($conn));
				}
		}
		
	}
}
$conn->close(); 
?>

</body>
</html>
