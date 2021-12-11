<!DOCTYPE html>
<html lang="en">

<head>
	<title> Exam </title>
	<link rel='stylesheet' href='q15.css'>
</head>

<body style="text-align:center">
	<?php
	$db = mysqli_connect(
		"localhost",
		"root",
		"",
		"exam"
	);
	$password = $_POST['password'];
	$query = "SELECT `password` FROM `user` WHERE PASSWORD = '$password'";
	$results = mysqli_query($db, $query);

	$queryTaken = "SELECT `taken` FROM `user` WHERE PASSWORD = '$password';";
	$resultsTaken = mysqli_query($db, $queryTaken);

	if (mysqli_num_rows($results) == 0) {
		print("Password is invalid, please enter a valid password");
	} else if (mysqli_fetch_assoc($resultsTaken)['taken'] == "yes") {
		print("This user has already taken the survey");
	} else {

	?>
		<form action="results.php" method="post">
			<table style="margin:auto; border:1px solid black;">
				<?php
				$sql = "SELECT * FROM `question`;";
				$selectResults = mysqli_query($db, $sql);
				$number = 1;
				while ($result = mysqli_fetch_assoc($selectResults)) {
				?>
					<tr>
						<td style="border: 1px solid black">
							<input type="hidden" name="prevPass" value="<?= $password ?>"></input>
							<input type="hidden" name="question<?= $number ?>" value="<?= $result['question'] ?>"><?= $result['question'] ?></input>
							<input type="radio" name="answer<?= $number ?>" value="1"> <?= $result['answer1'] ?> </input>
							<input type="radio" name="answer<?= $number ?>" value="2"> <?= $result['answer2'] ?> </input>
							<input type="radio" name="answer<?= $number ?>" value="3"> <?= $result['answer3'] ?> </input>
							<input type="radio" name="answer<?= $number ?>" value="4"> <?= $result['answer4'] ?> </input>
						</td>
					</tr>
			<?php
					$number++;
				}

				echo
				"</table>
            <br>

            <input type='text' name='examPassword' id='examPassword' placeholder='Password'></input>
            <br><br>
            <button type='submit'> Submit Exam </button>
        </form>";
			}
			?>
</body>

</html>