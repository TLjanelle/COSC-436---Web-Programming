<!DOCTYPE html>
<html lang="en">

<head>
	<title> Survey Results </title>
	<link rel='stylesheet' href='q13.css'>
</head>

<body style="text-align:center">
	<?php
	$db = mysqli_connect(
		"localhost",
		"root",
		"",
		"survey"
	);
	$password = $_POST['surveyPassword'];
	$query = "SELECT `password` FROM `surveyor` WHERE PASSWORD = '$password';";
	$results = mysqli_query($db, $query);
	if (mysqli_num_rows($results) == 0) {
		print("Password is invalid, please enter a valid password");
	} else {

	?>
		<form action="" method="post">
			<table style="margin:auto; border:1px solid black;">
				<tr>
					<th>Question</th>
					<th>Yes</th>
					<th>No</th>
				</tr>
				<?php
				$sql = "SELECT * FROM `question`;";
				$selectResults = mysqli_query($db, $sql);
				while ($result = mysqli_fetch_assoc($selectResults)) {
					$yes = $result['y'];
					$no = $result['n'];
					$yesP = round(100 * ($yes / ($yes + $no))) . "%";
					$noP = round(100 * ($no / ($yes + $no))) . "%";
				?>
					<tr>
						<td style="border: 1px solid black">
							<?= $result['question'] ?>
						</td>
						<td style="border: 1px solid black">
							<?= $yesP ?>
						</td>
						<td style="border: 1px solid black">
							<?= $noP ?>
						</td>
					</tr>
			<?php
				}
			}
			?>
			</table>
		</form>
</body>

</html>