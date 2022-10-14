<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width">
	<meta charset="UTF-8">
	<title>Ενδιαφέρουσες ιστοσελίδες</title>
	<link rel="stylesheet" type="text/css" href="css/template.css">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/navigation.css">
	<link rel="stylesheet" type="text/css" href="css/menus_of_sites.css">
	<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital@1&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<?php // index.php
require_once "libraries/php/createElements.php";
?>

<body class="grid-container">
	<header class="header">
		<h1>Ενδιαφέρουσες ιστοσελίδες</h1>


		<form method="get" action="http://www.google.com/search">
			<div class="logo">
				<img alt="Google" src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png">
			</div>
			<div class="bar">
				<input style="padding:10px;border-radius:24px;border:3px solid blue;" type="text" name="q" size="25" style="color:#808080;" maxlength="255" value="Google site search" onfocus="if(this.value==this.defaultValue)this.value=''; 
				this.style.color='black';" onblur="if(this.value=='')this.value=this.defaultValue; ">
				<!--
		<input type="submit" value="Go!">
		<input type="hidden" name="sitesearch" value="">
		-->
			</div>
			<br>
		</form>


	</header>
	<nav class="navigation">
		<!-- 		<a class="material-icons" onclick="openNav()">
			view_headline
		</a> -->
		<a class="" onclick="openNav()">
			<img style="width:30px;" src="./images/menuButton.png">
		</a>
		<div id="myNav" class="overlay">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<div class="overlay-content">
				<!--<a href="html/about.html">About</a>-->
				<a href="./administrator/index.php">About</a>
				<a href="administrator/php/add_group.php">Προσθήκη ομάδας ιστοσελίδων</a>
				<a href="administrator/php/add_site.php">Προσθήκη ιστοσελίδας</a>
				<a href="administrator/php/contact.php">Contact</a>
			</div>
		</div>
	</nav>
	<script src="javascript/navigation.js"></script>
	<main class="main flex-container bg-text">

		<?php

		require_once('./mysqli_connect.php'); // Connect to the db.

		// Make the query:
		$q = "	
		SELECT group_id AS gid, name, id_attribute AS id, member_id
		FROM groups 
		WHERE member_id = 1
		ORDER BY name ASC;";

		$r = @mysqli_query($dbc, $q); // Run the query.

		// Count the number of returned rows:
		$num = mysqli_num_rows($r);

		if ($num > 0) { // If it ran OK, display the records.

			// Fetch and print all the records:
			while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
				openATeamFrame($row['name'], $row['id']);
				//you can add it in css, too.

				//------------
				//put the sites
				// Make the query:
				$q1 = "	
				SELECT url, image
				FROM sites
				WHERE group_id=$row[gid];";

				//WHERE group_id=1

				$r1 = @mysqli_query($dbc, $q1); // Run the query.

				// Count the number of returned rows:
				$num1 = mysqli_num_rows($r1);

				if ($num1 > 0) { // If it ran OK, display the records.

					// Fetch and print all the records:
					while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
						createASiteFrame($row1['url'], $row1['image']);
					}

					mysqli_free_result($r1); // Free up the resources.	

				}

				//------------
				closeATeamFrame();
			}

			mysqli_free_result($r); // Free up the resources.	

		}

		?>
	</main>
	<footer class="footer">
		&copy; Copyright 2020-2022 tolis' s team
		<address>
			Contact: <a href="https://github.com/Apostolos172">Apostolos172</a>
		</address>
	</footer>

	<script src="./libraries/js/util.js"></script>
	<script>
		openAllAnchorsToNewTab();
		defineColorsAtGroups();
	</script>
</body>

</html>