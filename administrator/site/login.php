
<?php // login.php

if (isset($_POST['submitted'])) {

	require_once('./../libraries/php/login_functions.inc.php');
	require_once('./../../mysqli_connect.php');
	list($check, $data) = check_login($dbc, $_POST['email'], $_POST['psw']);

	if ($check) { // OK!

		// Set the session data:.
		session_start();
		$_SESSION['admin'] = $data['email'];

		// Redirect:
		$url = absolute_url();
		header("Location: $url");
		exit();
	} else { // Unsuccessful!
		$errors = $data;
	}

	mysqli_close($dbc);
	// print 'hello from login page';
} // End of the main submit conditional.

include('./login_page.php');
?>
