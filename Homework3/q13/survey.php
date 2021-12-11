<!DOCTYPE html>
<html lang="en">

<head>
	<title> Survey </title>
	<link rel='stylesheet' href='q13.css'>
</head>

<body style="text-align:center">
	<header>Survey</header><br>
	<?php
	$db = mysqli_connect(
		"localhost",
		"root",
		"",
		"survey"
	);
	?>
	<form action="surveycheck.php" method="post">
		<table style="margin:auto; border:1px solid black;">
			<?php
			$sql = "SELECT question FROM `question`;";
			$selectResults = mysqli_query($db, $sql);
			$number = 1;
			while ($result = mysqli_fetch_assoc($selectResults)) {
			?>
				<tr>
					<td style="border: 1px solid black">
						<input type="hidden" name="question<?= $number ?>" value="<?= $result['question'] ?>"><?= $result['question'] ?></input>
					</td>
					<td style="border: 1px solid black">
						<input type="radio" name="answer<?= $number ?>" value="yes"> Yes </input>
					</td>
					<td style="border: 1px solid black">
						<input type="radio" name="answer<?= $number ?>" value="no"> No </input>
					</td>
				</tr>
			<?php
				$number++;
			}
			?>
		</table>
		<br>

		<input type="text" name="password" id="examPassword" placeholder="Password"></input>
		<br><br>
		<button type="submit"> Submit Exam </button>
	</form>
</body>

</html>