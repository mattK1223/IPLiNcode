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
	<body>

		<script>
		function ChangeDisplay() {
			var copyrightType = document.getElementById("copyType");

			var yt_Autofill_Button = document.getElementById("ytAuto");
			
			var copySelect = document.getElementById("copySelect");
			var regNum = document.getElementById("regNum");
			var regDate = document.getElementById("regDate");		
			var pubDate = document.getElementById("pubDate");
			var workType = document.getElementById("workType");

			var patentSelect = document.getElementById("patentSelect");
			var appNum = document.getElementById("appNum");
			var patentNum = document.getElementById("patentNum");
			var filingDate = document.getElementById("filingDate");
			var issueDate = document.getElementById("issueDate");
			var abstract = document.getElementById("abstract");	

			var tradeSelect = document.getElementById("tradeSelect");
			var serialNum = document.getElementById("serialNum");		
			var registNum = document.getElementById("registNum");		
			var status = document.getElementById("status");

			var youtubeSelect = document.getElementById("youtubeSelect");
			
			var licenseSelect =document.getElementById("licenseSelect");
			var licenseName =document.getElementById("licenseName");
			var startDate =document.getElementById("startDate");
			var endDate =document.getElementById("endDate");
			var payment =document.getElementById("payment");
			
			
			if ( copyrightType.value == "copyright" )
			{
				copySelect.style.display = "table-row";
				regNum.style.display="table-row";
				regDate.style.display="table-row";
				pubDate.style.display="table-row";
				workType.style.display="table-row";
				patentSelect.style.display="none";
				appNum.style.display="none";
				patentNum.style.display="none";
				filingDate.style.display="none";
				issueDate.style.display="none";
				abstract.style.display="none";
				tradeSelect.style.display="none";
				serialNum.style.display="none";
				registNum.style.display="none";
				status.style.display="none";	
				youtubeSelect.style.display="none";
				licenseSelect.style.display="none";
				licenseName.style.display="none";
				startDate.style.display="none";
				endDate.style.display="none";
				payment.style.display="none";

				yt_Autofill_Button.style.display="none";
			}
			else if ( copyrightType.value == "patent" )
			{
				copySelect.style.display = "none";
				regNum.style.display="none";
				regDate.style.display="none";
				pubDate.style.display="none";
				workType.style.display="none";
				patentSelect.style.display="table-row";
				appNum.style.display="table-row";
				patentNum.style.display="table-row";
				filingDate.style.display="table-row";
				issueDate.style.display="table-row";
				abstract.style.display="table-row";
				tradeSelect.style.display="none";
				serialNum.style.display="none";
				registNum.style.display="none";
				status.style.display="none";
				youtubeSelect.style.display="none";
				licenseSelect.style.display="none";
				licenseName.style.display="none";
				startDate.style.display="none";
				endDate.style.display="none";
				payment.style.display="none";

				yt_Autofill_Button.style.display="none";
			}
			else if ( copyrightType.value == "trademark" )
			{
				copySelect.style.display = "none";
				regNum.style.display="none";
				regDate.style.display="none";
				pubDate.style.display="none";
				workType.style.display="none";
				patentSelect.style.display="none";
				appNum.style.display="none";
				patentNum.style.display="none";
				issueDate.style.display="none";
				abstract.style.display="none";
				tradeSelect.style.display="table-row";
				serialNum.style.display="table-row";
				registNum.style.display="table-row";
				status.style.display="table-row";
				filingDate.style.display="table-row";	
				youtubeSelect.style.display="none";
				licenseSelect.style.display="none";
				licenseName.style.display="none";
				startDate.style.display="none";
				endDate.style.display="none";
				payment.style.display="none";

				yt_Autofill_Button.style.display="none";
			}
			else if ( copyrightType.value == "youtubevideo" )
			{
				copySelect.style.display = "none";
				regNum.style.display="none";
				regDate.style.display="none";
				workType.style.display="none";
				patentSelect.style.display="none";
				appNum.style.display="none";
				patentNum.style.display="none";
				issueDate.style.display="none";
				abstract.style.display="none";
				tradeSelect.style.display="none";
				serialNum.style.display="none";
				registNum.style.display="none";
				status.style.display="none";
				filingDate.style.display="none";	
				youtubeSelect.style.display="table-row";
				pubDate.style.display="table-row";
				licenseSelect.style.display="none";
				licenseName.style.display="none";
				startDate.style.display="none";
				endDate.style.display="none";
				payment.style.display="none";

				yt_Autofill_Button.style.display="table-row";
			}
			else
			{
				copySelect.style.display = "none";
				regNum.style.display="none";
				regDate.style.display="none";
				workType.style.display="none";
				patentSelect.style.display="none";
				appNum.style.display="none";
				patentNum.style.display="none";
				issueDate.style.display="none";
				abstract.style.display="none";
				tradeSelect.style.display="none";
				serialNum.style.display="none";
				registNum.style.display="none";
				status.style.display="none";
				filingDate.style.display="none";	
				youtubeSelect.style.display="none";
				pubDate.style.display="none";
				licenseSelect.style.display="table-row";
				licenseName.style.display="table-row";
				startDate.style.display="table-row";
				endDate.style.display="table-row";
				payment.style.display="table-row";
			}
		}

		function required()
		{
			var empty = document.forms["theForm"]["ownerName"].value;
			if (empty == "")
			{
				alert("Please input an Owner");
				return false;
			}
			
			var empty = document.forms["theForm"]["URL"].value;
			if (empty == "")
			{
				alert("Please input a URL");
				return false;
			}

			var empty = document.forms["theForm"]["Title"].value;
			if (empty == "")
			{
				alert("Please input a Title");
				return false;
			}

			var Type = document.getElementById("copyType");	
			var licenseName = document.forms["theForm"]["LiName"].value;
			if ( Type.value == "license" && licenseName == "")
			{
				alert("Please input a License Name");
				return false;
			}

			return true;
		}
		</script>

	<ul>
	  <li><a href="search.html">Home</a></li>
	  <li><a href="about.html">About</a></li>
	  <li><a class="active" href="insert.html">Insert</a></li>
	  <li><a href="update.html">Update</a></li>
	  <li><a href="delete.html">Delete</a></li>
	  <li><a href="statistics.html">Statistics</a></li>
	</ul>

	<h1>Insert Record</h1>

	<form name="theForm" action="insert_page.php" onsubmit="return required()" style="text-align:left">
	<center>

	*Fields that are starred are required
	</br>
	</br>
	Type: <select name="copyrightType" id="copyType" onchange="ChangeDisplay()">
		<option value="copyright"> Copyright </option>
		<option value="patent"> Patent </option>
		<option value="trademark"> Trademark </option>
		<option selected value="youtubevideo"> Youtube Video </option>
		<option value="license"> License </option>
	</select>


	</br>


	<table border="0">
		<tr>
			<td><label for="ownerName">*Owner:</label></td> 
			<td><input type="text" id="ownerName" name="ownerName" /></td> 
		</tr>	
		<tr>
			<td><label for="ownerAddress">Owner Address:</label></td>
			<td><input type="text" id="ownerAddress" name="ownerAddress" /></td>
		</tr>
		<tr>
			<td><label for="URL">*URL:</label></td>
			<td><input type="url" id="URL" name="URL" /></td>
<!-- YTAUTOFILL -->
			<td><input type="submit" id="ytAuto" name="ytAuto" value="Autofill" style="display:none" action="insert_ytfill.php"/></td>
		</tr>
		<tr>
			<td><label for="Title">*Title:</label></td>
			<td><input type="text" id="Title" name="Title" /></td>
		</tr>
	</table>

	<div id="copySelect">
	</br></br>Copyright Specific:</br>
	</div>

	<div id="regNum">
	Registration Number:
	<input type="text" name="registrationNum">
	</br>
	</div>
	<div id="regDate">
	Registration Date:
	<input type="date" name="registrationDate">
	</br>
	</div>
	<div id="workType">
	Type of Work:
	<input type="text" name="type">
	</br>
	</div>


	<div id="patentSelect" style="display:none">
	</br></br>Patent Specific:</br>
	</div>

	<div id="appNum" style="display:none">
	Application Number:
	<input type="text" name="appNum">
	</br>
	</div>
	<div id="patentNum" style="display:none">
	Patent Number:
	<input type="text" name="patentNum">
	</br>
	</div>
	<div id="issueDate" style="display:none">
	Issue Date:
	<input type="date" name="issueDate">
	</br>
	</div>
	<div id="abstract" style="display:none">
	Abstract:
	<input type="text" name="abstract">
	</br>
	</div>

	<div id="tradeSelect" style="display:none">
	</br></br>Trademark Specific:</br>
	</div>

	<div id="serialNum" style="display:none">
	Serial Number:
	<input type="text" name="serialNum">
	</br>
	</div>
	<div id="registNum" style="display:none">
	Registration Number:
	<input type="text" name="registNum">
	</br>
	</div>
	<div id="status" style="display:none">
	Status:
	<input type="text" name="status">
	</br>
	</div>
	<div id="filingDate" style="display:none">
	Filing Date:
	<input type="date" name="filingDate">
	</br>
	</div>

	<div id="youtubeSelect" style="display:none">
	</br></br> Youtube Specifics:</br>
	</div>
	<div id="pubDate">
	Publication Date:
	<input type="date" name="publicationDate">
	</br>
	</div>

	<div id="licenseSelect" style="display:none">
	</br></br> License Specifics:</br>
	</div>
	<div id="licenseName" style="display:none">
	*License Name:
	<input type="text" name="LiName" >
	</br>
	</div>
	<div id="startDate" style="display:none">
	Start Date:
	<input type="date" name="Listart" >
	</br>
	</div>
	<div id="endDate" style="display:none">
	End Date:
	<input type="date" name="LiEnd">
	</br>
	</div>
	<div id="payment" style="display:none">
	Payment:
	<input type="text" name="LiPay" >
	</br>
	</div>


	</br>
	</br>
	<input type="submit" value="Insert">

	</center>
	</form>
	</body>
</html>
