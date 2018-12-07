<!DOCTYPE html>
<html>
<header>
</header>

<form method="post" action="">
<label for="url">URL:</label>
<input type="text" id="url" name="url">
<input type="submit">
</form>

<?php
	
	include_once 'simple_html_dom.php';

	if(isset($_POST['url']))
	{
		// Need to set $url to the youtube video URL
		// To be used for insert.html
		$url= $_POST['url'];
		if($url!='')
		{
			echo $url; 

			$html = file_get_html($url);
			$ownerName = $html->find('div[class=yt-user-info] a',0)->innertext;
			$ownerAddress = 'https://youtube.com' . $html->find('div[id=watch7-user-header] a',0)->href;
			$videoTitle = $html->find('meta[name=title]',0)->content;
			
			$publicationDateString = $html->find('strong[class=watch-time-text]',0)->innertext;
			$publicationDate = (DateTime::createFromFormat('!M j, Y', substr($publicationDateString,13)))->format('Y-m-d');

			echo '<br>';
			echo $ownerName;
			echo '<br>';
			echo $ownerAddress;
			echo '<br>';
			echo $videoTitle;
			echo '<br>';
			echo $publicationDateString . "  --->  " . $publicationDate;
		}
 	}
?>

</html>
