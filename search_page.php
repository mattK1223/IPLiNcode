<!DOCTYPE html>
<html>
<body>

<?php
$servername="localhost";
$username="klopfens";
$password="P0za4TSlbSTSq58v";

$search_table=$_POST['tableSelect'];
$search_field=$_POST['fieldSelect'];
$search_value=$_POST['keyword'];
//Create a connection
$conn= new mysqli($servername,$username,$password);

//Check connection
if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
echo "Connected succesfully";
	
if ( $search_table == "all" )
{
	$sql = "select 'search_field' from * where 'search_field' like '%search_value%'";
	$res = $con->query($sql);
		
	while ( $row=$res->fetch_assoc()) {
		echo $search_value, ' ',$row['search_field'];
	}
}
?>

</body>
</html>
