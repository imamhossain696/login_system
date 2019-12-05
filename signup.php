<?php
	require "header.php"
?>

	<main>
		<h2>Signup</h2>

		<?php
			if (isset($_GET['error'])) {

				if ($_GET['error'] == "emptyfields") {
					echo '<p>Fill in all fields!</p>';
				}
				else{
					echo '<p>Fill in with correct values!</p>';
				}
				
			}
			else if (isset($_GET['signup']) == "success") {
				echo '<p>Signup successfull!</p>';
			}
		?>

		<form action="include/signup.inc.php" method="POST">

			<p>Username:</p>
			<input type="text" name="uid" placeholder="Username">
			<br>
			<p>E-mail:</p>
			<input type="text" name="mail" placeholder="E-mail">
			<br>
			
			<p>Address:</p>
			<input type="text" name="address" placeholder="Address">
			<br>
			<p>Phone number:</p>
			<input type="text" name="pnumber" placeholder="Username">
			<br>
			<p>Password:</p>
			<input type="text" name="pwd" placeholder="Password">
			<br>
			<p>Repeat password:</p>
			<input type="text" name="pwd-repeat" placeholder="Repeat password">
			<br>
			<br>
			
			<button type="submit" name="signup-submit">Signup</button>

		</form>


	</main>

<?php
	require "footer.php"
?>