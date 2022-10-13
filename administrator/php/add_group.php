<?php
session_start(); // Access the existing session. - Start the session.
if (isset($_SESSION['admin'])) :
	// add_group.php

	// Εδώ φαίνεται μια απλή φόρμα εισαγωγής νέας ομάδας ιστοσελίδων στο ηλεκτρονικό σύστημα
	// Φτάνεις εδώ από το μενού του περιβάλλοντος με την επιλογή Add group

	$page_title = 'Add a group of sites';
	require_once "./../html/header.html";
	require_once('./../libraries/php/createElements.php'); // library
?>
	<main class="main">

		<?php

		require_once('./../../mysqli_connect.php');

		if (isset($_POST['submitted'])) { // Handle the form.

			// Validate the incoming data...
			$errors = array();

			$name = (string)trim($_POST['nameOfGroup']);
			$id = (string)trim($_POST['id']);
			$mid = (int)trim($_POST['member_id']);

			if (empty($errors)) { // If everything's OK.

				// Add the print to the database:
				$q = '
		INSERT INTO groups (id_attribute, name, member_id) 
		VALUES (?, ?, ?);';
				$stmt = mysqli_prepare($dbc, $q);
				mysqli_stmt_bind_param($stmt, 'ssd', $id, $name, $mid);
				mysqli_stmt_execute($stmt);

				// Check the results...
				if (mysqli_stmt_affected_rows($stmt) == 1) {

					// Print a message:
					p('The group has been added.');

					// Clear $_POST:
					$_POST = array();
				} else { // Error!
					echo '<p style="font-weight: bold; color: #C00">Your submission could not be processed due to a system error.</p>';
				}

				mysqli_stmt_close($stmt);
			} // End of $errors IF.

		} // End of the submission IF.

		// Display the form...
		?>
		<h1>Add a group of sites</h1>
		<form action="add_group.php" method="post">
			<fieldset>
				<legend>Fill out the form to add a group of sites:</legend>
				<label>Name of the group: <input type="text" name="nameOfGroup" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" required placeholder="Ελλάδα"></label>
				<label>id attribute for the group: <input type="text" name="id" value="<?php if (isset($_POST['id'])) echo $_POST['id']; ?>" required placeholder="Greece"></label>
				<label>Αναγνωριστικό χρήστη <input type="text" name="member_id" value="<?php if (isset($_POST['member_id'])) echo $_POST['member_id']; ?>" required placeholder="1"></label>

				<div align="center"><input type="submit" name="submit" value="Προσθήκη ομάδας"></div>
				<input type="hidden" name="submitted" value="TRUE">
			</fieldset>
		</form>

	</main>
	<?php
	require_once "./../html/footer.html";
	?>
<?php
else :
	$newURL = "./../site/login_page.php";
	header('Location: ' . $newURL);
endif;
?>