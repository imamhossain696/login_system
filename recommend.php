<?php 
	include_once 'include/dbh.inc.php';
	session_start();


	$sql = "SELECT * FROM centraldata;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	$count = 1;
	$count2 = 1;
	$count3 = 1;
	$count4 = 1;
	$userData = array();
	$offerData = array();
	if ($resultCheck>0) {	
		while($row = mysqli_fetch_assoc($result)){

			if ($row['uid'] == $_SESSION['userUid']) {
				$userData[] = $row;
			}
			else if ($row['uid'] !== $_SESSION['userUid']) {
				$offerData[] = $row;
			}
		}
	}

	echo "<h3>My Books(".$_SESSION['userUid']."):</h3>";
	foreach ($userData as $data ) {

		$string = $count.". ".$data['bookname']. "<br>";
		echo $string;
		$count++;
			
	}

	$count = 1;
	echo "<h3>My Requested Books(".$_SESSION['userUid']."):</h3>";
	foreach ($userData as $data ) {

		$string = $count.". ".$data['reqbook']. "<br>";
		echo $string;
		$count++;
			
	}

	$count = 1;
	echo "<h3>Offers: </h3><hr>";
	foreach ($offerData as $data ) {
		$othersOfferedBook = strtolower($data['bookname']);
		$othersReqBook = strtolower($data['reqbook']);
		$othersAuthor = strtolower($data['author']);
		$othersReqAuthor = strtolower($data['reqauthor']);
		$othersReqGenre = strtolower($data['reqgenre']);
		$othersGenre = strtolower($data['genre']);

		foreach ($userData as $data2 ) {
			$userReqBook = strtolower($data2['reqbook']);
			$userOfferedBook = strtolower($data2['bookname']);
			$userAuthor = strtolower($data2['author']);
			$userReqAuthor = strtolower($data2['reqauthor']);
			$userReqGenre = strtolower($data2['reqgenre']);
			$userGenre = strtolower($data2['genre']);

			if (preg_match("/$othersOfferedBook/", $userReqBook) && preg_match("/$othersReqBook/", $userOfferedBook)) {

				$string= $count.". User Name: ".$data['uid']."<br>Offered Book: ".$data['bookname']."<br>Requested book: ".$data['reqbook']."<br>Contact: ".$data['pnumber']."<br>";

				echo "stage 1<br>".$string;
				$count++;

				?><button type="submit" name="exchange">Exchange</button><br><br> <?php
			}
			else if (!(preg_match("/$othersOfferedBook/", $userReqBook) && preg_match("/$othersReqBook/", $userOfferedBook))&& $count==1 && preg_match("/$othersOfferedBook/", $userReqBook) ) {
				
				if (preg_match("/$othersReqAuthor/", $userAuthor) && preg_match("/$othersReqGenre/", $userGenre)) {

					$string= $count2.". User Name: ".$data['uid']."<br>Offered Book: ".$data['bookname']."<br>Requested book: ".$data['reqbook']." by ".$data['reqauthor']."<br>Genre: ".$data['reqgenre']."<br>Contact: ".$data['pnumber']."<br><br>My Offer: ".$data2['bookname']." by ".$data2['author']."<br>Genre: ".$data2['genre']."<br>";

					echo "stage 2<br>".$string;
					$count2++;

					?><button type="submit" name="request">Request</button><br><br> <?php
				}
				else if (preg_match("/$othersReqAuthor/", $userAuthor) && !preg_match("/$othersReqGenre/", $userGenre) && $count2==1) {
					
					$string= $count2.". User Name: ".$data['uid']."<br>Offered Book: ".$data['bookname']."<br>Requested book: ".$data['reqbook']." by ".$data['reqauthor']."<br>Genre: ".$data['reqgenre']."<br>Contact: ".$data['pnumber']."<br><br>My Offer: ".$data2['bookname']." by ".$data2['author']."<br>Genre: ".$data2['genre']."<br>";

					echo "stage 3<br>".$string;
					$count3++;

					?><button type="submit" name="request">Request</button><br><br> <?php
				}
				else if (!preg_match("/$othersReqAuthor/", $userAuthor) && preg_match("/$othersReqGenre/", $userGenre) && $count3==1) {
					
					$string= $count2.". User Name: ".$data['uid']."<br>Offered Book: ".$data['bookname']."<br>Requested book: ".$data['reqbook']." by ".$data['reqauthor']."<br>Genre: ".$data['reqgenre']."<br>Contact: ".$data['pnumber']."<br><br>My Offer: ".$data2['bookname']." by ".$data2['author']."<br>Genre: ".$data2['genre']."<br>";

					echo "stage 4<br>".$string;
					$count4++;

					?><button type="submit" name="request">Request</button><br><br> <?php
				}
				
			}
			else if($count==1 && $count2==1 && $count3==1 && $count4==1){
				echo "stage 5<br>No suitable Exchange is possible currently<br>";
			}
		}
	}

	?><a href="index.php">Go home</a><?php



?>