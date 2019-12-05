<?php 
	session_start();
	if (isset($_POST['exchange-submit'])) {
		
		include_once 'dbh.inc.php';

		$bookname = $_POST['bookname'];
		$author = $_POST['author'];
		$genre = $_POST['genre'];
		$condition = $_POST['condition'];
		$reqbook = $_POST['reqbook'];
		$reqauthor = $_POST['reqauthor'];
		$reqgenre = $_POST['reqgenre'];
		$uid = $_SESSION['userUid'];
		$address = $_SESSION['userAddress'];
		$pnumber = $_SESSION['userPnumber'];

		if (empty($bookname) || empty($reqbook)|| empty($genre)|| empty($reqgenre)) {
			
			header("Location: ../exchange.php?error=emptyfields");
			exit();
		}
		else{
			$sql = "INSERT INTO centraldata(uid, address, pnumber, bookname, author, genre, bcondition, reqbook, reqauthor, reqgenre)VALUES('$uid', '$address', '$pnumber','$bookname','$author','$genre','$condition','$reqbook','$reqauthor','$reqgenre');";
		mysqli_query($conn, $sql);

		header("Location: ../index.php?exchange=success");
		}

		
	}
	else{
		header("Location: ../exchange.php");
		exit();
	}
?>