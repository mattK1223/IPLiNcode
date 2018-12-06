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

<h1>Update License</h1>

<form action="update_license_input.php">
<center>
<table border="0">
	<tr>
		<td><label for="url">URL:</label></td>
		<td><input type="text" id="url" name="url" /></td>
	</tr>
	<tr>
		<td><label for="url">Licensee:</label></td>
		<td><input type="text" id="licensee" name="licensee" /></td>
	</tr>
</table>
</br>
</br>
<input type="submit" value="Find">
</center>
</form>
</body>
</html>