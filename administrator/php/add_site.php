<?php
// add_site.php

session_start(); // Access the existing session. - Start the session.
if (isset($_SESSION['role']) and strcmp($_SESSION['role'], 'administrator') == 0) :

	// Εδώ φαίνεται μια απλή φόρμα εισαγωγής νέας ιστοσελίδας στο ηλεκτρονικό σύστημα
	// Φτάνεις εδώ από το μενού του περιβάλλοντος με την επιλογή Add site

	$page_title = 'Add a site';
	require_once "./../html/header.html";
	require_once('./../libraries/php/createElements.php'); // library
?>
	<main class="main">

		<?php

		require_once('../../mysqli_connect.php');

		if (isset($_POST['submitted'])) { // Handle the form.

			// Validate the incoming data...
			$errors = array();

			$name = (string)trim($_POST['nameOfProduct']);
			$img = (string)trim($_POST['img']);
			$category = (int)trim($_POST['category']);

			if (empty($errors)) { // If everything's OK.

				// Add the print to the database:
				$q = '
		INSERT INTO sites (url, image, group_id) 
		VALUES (?, ?, ?);';
				$stmt = mysqli_prepare($dbc, $q);
				mysqli_stmt_bind_param($stmt, 'ssd', $name, $img, $category);
				mysqli_stmt_execute($stmt);

				// Check the results...
				if (mysqli_stmt_affected_rows($stmt) == 1) {

					// Print a message:
					p('The site has been added.');

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
		<h1>Add a site</h1>
		<form action="add_site.php" method="post">
			<fieldset>
				<legend>Fill out the form to add a site to a group:</legend>
				<label>Url of the site: <input type="text" name="nameOfProduct" value="<?php if (isset($_POST['nameOfProduct'])) echo $_POST['nameOfProduct']; ?>" required placeholder="http://example.com/"></label>
				<label>Διεύθυνση εικόνας ιστοσελίδας: <input type="text" name="img" value="<?php if (isset($_POST['img'])) echo $_POST['img']; ?>" required placeholder="https://cmsassets.public.gr/mrk/202005/8801643898076.mainImage.png"></label>
				<label>Ομάδα ιστοσελίδας:
					<select name="category" id="category" required>
						<?php

						echo '<option value="">--Επέλεξε κατηγορία--</option>';

						require_once('../../mysqli_connect.php'); // Connect to the db.

						// Make the query:
						$q = "SELECT group_id, name FROM groups ORDER BY name; ";

						$r = @mysqli_query($dbc, $q); // Run the query.

						// Count the number of returned rows:
						$num = mysqli_num_rows($r);

						if ($num > 0) { // If it ran OK, display the records.

							// Fetch and print all the records:
							while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
								$gid = $row['group_id'];
								$group_name = $row['name'];
								echo "<option value='$gid'>$group_name</option>";
							}

							mysqli_free_result($r); // Free up the resources.	
						}

						?>

					</select>
				</label>
				<div align="center"><input type="submit" name="submit" value="Προσθήκη ιστοσελίδας"></div>
				<input type="hidden" name="submitted" value="TRUE">
			</fieldset>
		</form>

	</main>
<?php
	require_once "./../html/footer.html";
elseif (isset($_SESSION['role']) and strcmp($_SESSION['role'], 'administrator') != 0) :
	require_once "./../html/header.html"; ?>
	<main class="main">
		<h2>Hello <?php echo $_SESSION['role']; ?></h2>
		<p id="forbidden"> Δεν έχετε πρόσβαση στην σελίδα</p>
		<?php
		require_once "./../libraries/php/createElements.php";
		manyEmptyPs();
		?>
	</main>
<?php
	require_once "./../html/footer.html";
else :
	$newURL = "./../site/login_page.php";
	header('Location: ' . $newURL);
endif;
?>