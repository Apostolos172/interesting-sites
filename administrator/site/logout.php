<?php //logout.php
session_start(); // Access the existing session. - Start the session.

// This page lets the user logout.

// Set the page title and include the HTML header:
$page_title = 'Logged Out!';
include('./../html/header.html');

// If no session variable exists, redirect the user:
if (!isset($_SESSION['role'])) {

	require_once('./../libraries/php/login_functions.inc.php');
	$url = absolute_url('login.php');
	header("Location: $url");
	exit();
} else { // Cancel the session.

	$_SESSION = array(); // Clear the variables.
	session_destroy(); // Destroy the session itself.
}
?>

<main class="main logout">
	<h1>Logged Out!</h1>
	<p>You are now logged out!</p>
	<p>
		Θα ανακατευθυνθείτε σε 7 δευτερόλεπτα στην αρχική σελίδα του συστήματος.
		Καλή συνέχεια!
	</p>
	<?php 
		require_once('./../libraries/php/createElements.php');
		manyEmptyPs(5);
	?>
	<script src='../libraries/js/generalFunctions.js'></script>
	<script>
		redirectionTo_In("./../../index.php", 7000);
	</script>
</main>
<?php
include('./../html/footer.html');
?>