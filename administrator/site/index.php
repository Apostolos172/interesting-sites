
<?php // index.php
require_once "./../libraries/php/createElements.php";
?>
<?php
session_start(); // Access the existing session. - Start the session.
if (isset($_SESSION['admin'])) : ?>
	<!DOCTYPE html>
	<html lang="el">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Interesting sites-Administrator</title>
		<link rel="stylesheet" type="text/css" href="../css/template.css">
		<link rel="stylesheet" type="text/css" href="../css/general.css">
		<link rel="stylesheet" type="text/css" href="../css/header.css">
		<link rel="stylesheet" type="text/css" href="../css/navigation.css">

		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>

	<body class="grid-container">
		<header class="header">
			<div>
				<h1>Interesting Sites-Administrator</h1>
				<h2>Control Panel</h2>
			</div>
			<div>
				<img src="../images/avatar.png" alt="Me" class="avatar">
			</div>
		</header>
		<nav class="navigation">
			<div class="sidebar sticky">
				<a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
				<a href="../php/add_site.php"><i class="material-icons">add_business</i> Add site</a>
				<a href="../php/add_group.php"><i class="material-icons">group_work</i> Add group</a>
				<!--
				<a href="../php/members.php"><i class="fa fa-fw fa-user"></i> Members</a>
				<a href="../php/groups.php"><i class="material-icons">storefront</i> Groups</a>
				<a href="../php/sites.php"><i class="fa fa-fw fa-wrench"></i> Sites</a>
				-->
				<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>
				<a href="../../" rel="noreferrer noopener" target="_blank"><i class="material-icons">language</i> Interesting Sites</a>
				<a href="logout.php">Logout</a>
			</div>
		</nav>
		<main class="main central">

			<h2>Υπηρεσίες του πίνακα ελέγχου</h2>
			<br>
			<p>
				Από την επιλογή Add site οδηγείσαι σε μια φόρμα όπου υπάρχει η δυνατότητα προσθήκης νέων
				ενδιαφερουσών ιστοσελίδων σε κάποια όμαδα υπάρχουσα ή καινούρια.
			</p>
			<p>
				Βέβαια για να προστεθεί ιστοσελίδα σε καινούρια ομάδα θα πρέπει πρώτα να δημιουργηθεί η ίδια η
				ομάδα από την επιλογή Add group.
			</p>
			<!-- <img style="width: 100%;" src="./../images/gif.gif"> -->
			<img style="width: 100%;" src="https://media.wired.com/photos/593240ca58b0d64bb35d07ce/master/w_1600%2Cc_limit/hexwave.gif">
			<?php //manyEmptyPs(5); ?>
			<!--
			<p>
				Από την επιλογή Members οδηγείσαι σε μια λίστα με τα στοιχεία των εγγεγραμμένων χρηστών
				του συστήματος. Βέβαια οι κωδικοί των χρηστών δεν είναι ορατοί αφού κατά την εγγραφή των χρηστών,
				αλλά και κατά την σύνδεσή τους, γίνεται άμεσα κρυπτογράφηση χωρίς να φτάνει στην βάση δεδομένων του
				συστήματος ο αρχικός κωδικός.
			</p>
			<p>
				Από την επιλογή Sites οδηγείσαι σε μια λίστα με τις ιστοσελίδες του συστήματος για τον administrator.
			</p>
			<p>
				Τέλος από την επιλογή Groups οδηγείσαι σε μια λίστα με όλες τις ομάδες ιστοσελίδων που έχουν πραγματοποιηθεί
				από τον administrator.
			</p>
			-->
		</main>
		<aside class="aside bgimg">
		</aside>
		<footer id="contact" class="footer">
			<div class="copy_design">
				&copy; Copyright 2020-2022 Interesting-Sites
				<span>
					Created by tolis' s team
				</span>
				<a href="./../php/contact.php">Διαχειριστής</a>
			</div>
		</footer>
	</body>

	</html>
<?php
else :
	$newURL = "./login_page.php";
	header('Location: ' . $newURL);
endif;
?>