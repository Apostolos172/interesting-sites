<?php session_start(); // Access the existing session. - Start the session.?>
<?php // contact.php
if (isset($_SESSION['admin'])) : 

// Λίγες πληροφορίες για τον διαχειριστή του ηλεκτρονικού συστήματος
// Ο διαχειριστής φτάνει εδώ από το σύνδεσμο Διαχειριστής στο κάτω μέρος κάθε σελίδας του διαχειριστικού
// 	περιβάλλοντος

	$page_title = 'Me';
	require_once "../html/header.html";
	require_once ('../libraries/php/createElements.php'); // library
?>
<main class="main">
	<h1><img src="../images/who.png" alt="Me"></h1>
	<article>
		<p class="adage"> "I have not failed. I've just found 10,000 ways that won't work." <br>- Thomas A. Edison</p>
		<h2>Λίγα λόγια για μένα</h2>
		<p>Φοιτητής τη δεδομένη χρονική περίοδο στο τμήμα της Εφαρμοσμένης Πληροφορικής
		του Πανεπιστημίου Μακεδονίας.</p>
		Check out my github account <a target="_blank" href="https://github.com/Apostolos172/">Apostolos172</a>
	</article>
</main>
<?php
	require_once "../html/footer.html";
?>
<?php
else :
	$newURL = "./../site/login_page.php";
	header('Location: ' . $newURL);
endif;
?>