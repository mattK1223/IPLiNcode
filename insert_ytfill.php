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

<h1>YouTube Autofill Insert</h1>
<h2>Test our web scraper by inserting a URL, then pressing Autofill!</h2>

<?php

include_once 'simple_html_dom.php';

if(isset($_POST['url']))
	{
		// Need to set $url to the youtube video URL
		// To be used for insert.html
		$url= $_POST['url'];
		if($url!='')
		{
			$html = file_get_html($url);
			$ownerName = $html->find('div[class=yt-user-info] a',0)->innertext;
			$ownerAddress = 'https://youtube.com' . $html->find('div[id=watch7-user-header] a',0)->href;
			$videoTitle = $html->find('meta[name=title]',0)->content;
			
			$publicationDateString = $html->find('strong[class=watch-time-text]',0)->innertext;
			$publicationDate = (DateTime::createFromFormat('!M j, Y', substr($publicationDateString,13)))->format('Y-m-d');
		}
 	}

echo "<form action='insert_ytfilltwo.php' method='post'>";
echo "<center>";
echo "<table border='0'>";
echo "	<tr><td><label for='url'>URL:</label></td><td><input type='text' name='url' value='$url'/></td><tr>";
echo "	<tr><td><label for='owner'>Owner:</label></td><td><input type='text' name='owner' value='$ownerName' /></td><tr>";
echo "  <tr><td><label for='ownerAddress'>Owner Address:</label></td><td><input type='text' name='ownerAddress' value='$ownerAddress'/></td><tr>";
echo "	<tr><td><label for='title'>Title:</label></td><td><input type='text' name='title' value='$videoTitle' /></td><tr>";
echo "	<tr><td><label for='pubDate'>Publication Date:</label></td><td><input type='text' name='pubDate' value='$publicationDate' /></td><tr>";
echo "</table>";
echo "<input type='submit' value='Insert'>";
echo "</center>";
echo "</form>";

?>

</body>
</html>
