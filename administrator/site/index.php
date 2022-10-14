<?php // index.php
require_once "./../libraries/php/createElements.php";
?>
<?php
session_start(); // Access the existing session. - Start the session.
if (isset($_SESSION['role']) and strcmp($_SESSION['role'], 'administrator') == 0) :
	require_once "./../html/header_index.html"; ?>

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
		<?php //manyEmptyPs(5); 
		?>
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

<?php
	require_once "./../html/footer_index.html";
elseif (isset($_SESSION['role']) and strcmp($_SESSION['role'], 'administrator') != 0) :
	require_once "./../html/header_index.html"; ?>
	<main class="main central">
		<h2>Hello <?php echo $_SESSION['role']; ?></h2>
		<p id="forbidden"> Δεν έχετε πρόσβαση στην σελίδα</p>
	</main>
<?php
	require_once "./../html/footer_index.html";
else :
	$newURL = "./login_page.php";
	header('Location: ' . $newURL);
endif;
?>