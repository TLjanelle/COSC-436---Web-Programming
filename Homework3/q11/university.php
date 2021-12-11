<!DOCTYPE html>
<html lang="en">

<head>
	<title> University Cost </title>
</head>

<body style="text-align:center">
	<h1> COST </h1>
	<?php
	error_reporting(0);
	if (($_POST['credits'] == "") || ($_POST['credits'] < 1) || ($_POST['credits'] > 18)) {
		print "ERROR: enter a number of credits between 1-18";
	} else if ($_POST['state'] == "") {
		print "ERROR: In-state or Out-of-state must be checked";
	} else if ($_POST['status'] == "") {
		print "ERROR: Undergraduate or Graduate must be checked";
	} else {
		$cost = 0;
		$credits = $_POST["credits"];
		$state = $_POST["state"];
		$status = $_POST["status"];
		$dorm = $_POST["dorm"];
		$dine = $_POST["dine"];
		$park = $_POST["park"];
		if ($status == "undergraduate") {
			$cost += 200 * $credits;
		} else if ($status == "graduate") {
			$cost += 300 * $credits;
		}
		if ($dorm == "on") {
			$cost += 1000;
		}
		if ($dine == "on") {
			$cost += 500;
		}
		if ($park == "on") {
			$cost += 200;
		}
		if ($state == "in") {
			$cost = $cost;
		} else if ($state == "out") {
			$cost = $cost * 2;
		}
	?>
		<table style="margin:auto">
			<tr>
				<th> ITEMS </th>
				<th> VALUES </th>
			</tr>
			<tr>
				<td> Credits </td>
				<?php print "<td> $credits </td>"; ?>
			</tr>
			<tr>
				<td> Undergraduate/Graduate </td>
				<?php print "<td> $status </td>"; ?>
			</tr>
			<tr>
				<td> In-state/Out-of-state </td>
				<?php print "<td> $state </td>"; ?>
			</tr>
			<tr>
				<td> Dorm </td>
				<?php
				if ($dorm == "on") {
					print "<td> $dorm </td>";
				} else {
					print "<td> Not Checked </td>";
				}
				?>
			</tr>
			<tr>
				<td> Dining </td>
				<?php
				if ($dine == "on") {
					print "<td> $dine </td>";
				} else {
					print "<td> Not Checked </td>";
				}
				?>
			</tr>
			<tr>
				<td> Parking </td>
				<?php
				if ($park == "on") {
					print "<td> $park </td>";
				} else {
					print "<td> Not Checked </td>";
				}
				?>
			</tr>
			<tr>
				<td> Total Cost </td>
				<?php print "<td> $$cost </td>"; ?>
			</tr>
		<?php
	}
		?>


		</table>
</body>

</html>