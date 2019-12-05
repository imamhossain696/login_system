<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="This is an example">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<header>
		<nav>
			
			<ul>
				<li><a href="index.php">Home</a></li>	
			</ul>		
		</nav>

		<?php
			if (isset($_SESSION['userId'])) {
				echo '<form action="include/logout.inc.php" method="post">
					<button type="submit" name="logout-submit">Logout</button>
				</form>
				<a href="exchange.php">Book Exchange</a><br>
				<a href="recommend.php">exchange offers</a>';
			}
			else{
				echo '<form action="include/login.inc.php" method="post">
					<input type="text" name="mailuid" placeholder="Username/E-mail...">
					<input type="text" name="pwd" placeholder="password">
					<button type="submit" name="login-submit">Login</button>
				</form>
				<a href="signup.php">Signup</a>';
			}
		?>
	</header>
</body>
</html>