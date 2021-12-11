<?php
	$db = mysqli_connect("localhost", "root",
	"", "survey");
	$password = $_POST['password'];
	$q1 = $_POST['question1'];
	$q2 = $_POST['question2'];
	$q3 = $_POST['question3'];
	$query = "SELECT `password` FROM `user` WHERE PASSWORD = '$password';";
	$results = mysqli_query($db, $query);
	
	$queryTaken = "SELECT `taken` FROM `user` WHERE PASSWORD = '$password';";
	$resultsTaken = mysqli_query($db, $queryTaken);
	
	if(mysqli_num_rows($results)==0){
		print("Password is invalid, please enter a valid password");
	} else if(mysqli_fetch_assoc($resultsTaken)['taken'] == "yes"){
		print("This user has already taken the survey");
	} else {
		if($_POST['answer1'] == "yes"){
			$selectYes1 = "SELECT `y` FROM `question` WHERE question = '$q1';";
			$selectResults1 = mysqli_query($db, $selectYes1);
			$yesCount1 = mysqli_fetch_assoc($selectResults1)['y'];
			$newYes1 = $yesCount1 + 1;
			$updateOneYes = "UPDATE `question` SET `y`='$newYes1' WHERE question = '$q1';";
			$update = mysqli_query($db, $updateOneYes);
		} else if($_POST['answer1'] == "no"){
			$selectNo1 = "SELECT `n` FROM `question` WHERE question = '$q1';";
			$selectResults1 = mysqli_query($db, $selectNo1);
			$noCount1 = mysqli_fetch_assoc($selectResults1)['n'];
			$newNo1 = $noCount1 + 1;
			$updateOneNo = "UPDATE `question` SET `n`='$newNo1' WHERE question = '$q1';";
			$update = mysqli_query($db, $updateOneNo);
		}
		if($_POST['answer2'] == "yes"){
			$selectYes2 = "SELECT `y` FROM `question` WHERE question = '$q2';";
			$selectResults2 = mysqli_query($db, $selectYes2);
			$yesCount2 = mysqli_fetch_assoc($selectResults2)['y'];
			$newYes2 = $yesCount2 + 1;
			$updateTwoYes = "UPDATE `question` SET `y`='$newYes2' WHERE question = '$q2';";
			$update = mysqli_query($db, $updateTwoYes);
		} else if($_POST['answer2'] == "no"){
			$selectNo2 = "SELECT `n` FROM `question` WHERE question = '$q2';";
			$selectResults2 = mysqli_query($db, $selectNo2);
			$noCount2 = mysqli_fetch_assoc($selectResults2)['n'];
			$newNo2 = $noCount2 + 1;
			$updateTwoNo = "UPDATE `question` SET `n`='$newNo2' WHERE question = '$q2';";
			$update = mysqli_query($db, $updateTwoNo);
		}
		if($_POST['answer3'] == "yes"){
			$selectYes3 = "SELECT `y` FROM `question` WHERE question = '$q3';";
			$selectResults3 = mysqli_query($db, $selectYes3);
			$yesCount3 = mysqli_fetch_assoc($selectResults3)['y'];
			$newYes3 = $yesCount3 + 1;
			$updateThreeYes = "UPDATE `question` SET `y`='$newYes3' WHERE question = '$q3';";
			$update = mysqli_query($db, $updateThreeYes);
		} else if($_POST['answer3'] == "no"){
			$selectNo3 = "SELECT `n` FROM `question` WHERE question = '$q3';";
			$selectResults3 = mysqli_query($db, $selectNo3);
			$noCount3 = mysqli_fetch_assoc($selectResults3)['n'];
			$newNo3 = $noCount3 + 1;
			$updateThreeNo = "UPDATE `question` SET `n`='$newNo3' WHERE question = '$q3';";
			$update = mysqli_query($db, $updateThreeNo);
		}
		$updateTaken = "UPDATE `user` SET `taken`='yes' WHERE password = '$password';";
		$update = mysqli_query($db, $updateTaken);
		print("Survey results submitted! Thank you!");
	}
?>