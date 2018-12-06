<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="project.css">
</head>
<body>
<ul>
  <li><a href="search.html">Home</a></li>
  <li><a href="about.html">About</a></li>
  <li><a href="insert.html">Insert</a></li>
  <li><a href="update.html">Update</a></li>
  <li><a href="delete.html">Delete</a></li>
  <li><a class="active" href="statistics.html">Statistics</a></li>
</ul>
</br> 
</br>
<?php
$servername="localhost";
$username="klopfens";
$password="P0za4TSlbSTSq58v";

$startSearch = $_GET["startSearch"];
$Title = $_GET["title"];
$OwnerN = $_GET["ownerN"];
$TypeWork =$_GET["type"];
$patNum = $_GET["patNum"];
$status = $_GET["status"];
//Create a connection
$conn= new mysqli($servername,$username,$password);

//Check connection
if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn, 'iplin') or die(mysqli_error);

echo "</br><center>Amount Counted:</center>";

if ( $startSearch == 'copyright' ) {
	if ( $Title == 'Any' && $OwnerN == 'Any' && $TypeWork == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM copyright";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	}
	else if ( $Title == 'Any' && $OwnerN == 'Any' && $TypeWork != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM copyright WHERE type = '$TypeWork'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	}
	else if ( $Title == 'Any' && $OwnerN != 'Any' && $TypeWork == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM copyright, ip WHERE copyright.id = ip.id && ip.IP_ownerName = '$OwnerN'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	}
	else if ( $Title == 'Any' && $OwnerN != 'Any' && $TypeWork != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM copyright, ip WHERE copyright.id = ip.id && ip.IP_ownerName = '$OwnerN' && type = '$TypeWork'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	}
	else if ( $Title != 'Any' && $OwnerN == 'Any' && $TypeWork == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM copyright, ip WHERE copyright.id = ip.id && ip.Title = '$Title'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title != 'Any' && $OwnerN == 'Any' && $TypeWork != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM copyright, ip WHERE copyright.id = ip.id && ip.Title = '$Title' && type = '$TypeWork'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}	
	else if ( $Title != 'Any' && $OwnerN != 'Any' && $TypeWork == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM copyright, ip WHERE copyright.id = ip.id && ip.Title = '$Title' && ip.IP_ownerName = '$OwnerN'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title != 'Any' && $OwnerN != 'Any' && $TypeWork != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM copyright, ip WHERE copyright.id = ip.id && ip.Title = '$Title' && ip.IP_ownerName = '$OwnerN' && type = '$TypeWork'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
}
else if ( $startSearch == 'license' )
{
	if ( $Title == 'Any' && $OwnerN == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM license";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title == 'Any' && $OwnerN != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM license, ip WHERE license.License_id = ip.id && ip.IP_ownerName = '$OwnerN' ";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title != 'Any' && $OwnerN == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM license, ip WHERE license.License_id = ip.id && ip.title = '$Title' ";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title != 'Any' && $OwnerN != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM license, ip WHERE license.License_id = ip.id && ip.IP_ownerName = '$OwnerN' && ip.title = '$Title' ";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
}
else if ( $startSearch == "patent" )
{
	if ( $Title == 'Any' && $OwnerN == 'Any' && $patNum == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM patent";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title == 'Any' && $OwnerN == 'Any' && $patNum != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM patent WHERE patentNum = '$patNum'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}	
	else if ( $Title == 'Any' && $OwnerN != 'Any' && $patNum == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM patent, ip WHERE patent.id = ip.id && id.IP_ownerName = '$OwnerN'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title == 'Any' && $OwnerN != 'Any' && $patNum != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM patent, ip WHERE patent.id = ip.id && patent.patentNum = '$patNum' && ip.IP_ownerName = '$OwnerN'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title != 'Any' && $OwnerN == 'Any' && $patNum == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM patent, ip WHERE patent.id = ip.id && ip.Title = '$Title'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title != 'Any' && $OwnerN == 'Any' && $patNum != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM patent, ip WHERE patent.id = ip.id && ip.Title = '$Title' && patent.patentNum = '$patNum'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title != 'Any' && $OwnerN != 'Any' && $patNum == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM patent, ip WHERE patent.id = ip.id && ip.Title = '$Title' && ip.IP_ownerName = '$OwnerN'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title != 'Any' && $OwnerN != 'Any' && $patNum != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM patent, ip WHERE patent.id = ip.id && ip.Title = '$Title' && ip.IP_ownerName = '$OwnerN' && patent.patentNum = '$patNum'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
}
else if ( $startSearch == "trademark" )
{
    if ( $Title == 'Any' && $OwnerN == 'Any' && $status == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM trademark";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title == 'Any' && $OwnerN == 'Any' && $status != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM trademark WHERE status = '$status'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}	
	else if ( $Title == 'Any' && $OwnerN != 'Any' && $status == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM trademark, ip WHERE trademark.id = ip.id && ip.IP_ownerName = '$OwnerN' ";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}		
	else if ( $Title == 'Any' && $OwnerN != 'Any' && $status != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM trademark, ip WHERE trademark.id = ip.id && status = '$status' && ip.IP_ownerName = '$OwnerN'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title != 'Any' && $OwnerN == 'Any' && $status == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM trademark, ip WHERE trademark.id = ip.id && ip.Title = '$Title'";	
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}		
	else if ( $Title != 'Any' && $OwnerN == 'Any' && $status != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM trademark,ip WHERE trademark.id = ip.id && ip.Title = '$Title' && status = '$status'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title != 'Any' && $OwnerN != 'Any' && $status == 'Any' ) {
			$sql = "SELECT COUNT(*) FROM trademark,ip WHERE trademark.id = ip.id && ip.Title = '$Title' && ip.IP_ownerName = '$OwnerN'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title != 'Any' && $OwnerN != 'Any' && $status != 'Any' ) {
			$sql = "SELECT COUNT(*) FROM trademark,ip WHERE trademark.id = ip.id && status = '$status' && ip.IP_ownerName = '$OwnerN' && ip.Title = '$Title'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}		
}
else if ( $startSearch == "youtube" )
{
	if ( $Title == 'Any' && $OwnerN == 'Any') {
			$sql = "SELECT COUNT(*) FROM youtubevideo";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}		
	else if ( $Title == 'Any' && $OwnerN != 'Any') {
			$sql = "SELECT COUNT(*) FROM youtubevideo, ip WHERE youtubevideo.id = ip.id && ip.IP_ownerName = '$OwnerN'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}
	else if ( $Title != 'Any' && $OwnerN == 'Any') {
			$sql = "SELECT COUNT(*) FROM youtubevideo, ip WHERE youtubevideo.id = ip.id && ip.Title = '$Title'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}		
	else if ( $Title != 'Any' && $OwnerN != 'Any') {
			$sql = "SELECT COUNT(*) FROM youtubevideo, ip WHERE youtubevideo.id = ip.id && ip.IP_ownerName = '$OwnerN' &&  ip.Title = '$Title'";
		$result = $conn->query($sql);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				foreach($row as $cname => $cvalue )
					print "<center> $cvalue\t</center>";
			}
		print "\r\n";
		}
	
	}	
}
$conn->close();
?>

</body>
</html>