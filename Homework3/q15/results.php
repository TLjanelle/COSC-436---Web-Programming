<!-- The exam results page must be created programatically using the exam results in the database. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Exam Results </title>
    <link rel='stylesheet' href='q15.css'>
</head>

<body>

    <?php
    $db = mysqli_connect("localhost", "root", "", "exam");
    $password = $_POST['examPassword'];
	$prevPass = $_POST['prevPass'];

    $query = "SELECT `password` FROM `user` WHERE PASSWORD = '$password';";
    $results = mysqli_query($db, $query);

    $queryTaken = "SELECT `taken` FROM `user` WHERE PASSWORD = '$password';";
    $resultsTaken = mysqli_query($db, $queryTaken);
	
    // The program again checks whether the passcode is valid and whether the user has not already taken the exam. 
    if (mysqli_num_rows($results) == 0) {
        //An error message is displayed indicating invalid password
        print("Password is invalid, please enter a valid password");
    } else if (mysqli_fetch_assoc($resultsTaken)['taken'] == "yes") {
        print "Exam has already been taken.";
    } else if ($prevPass != $password) {
        print "Please submit with the same password you logged in with";
    } else { 
        echo "<header>Exam Results</header><br>";
        //If both conditions are satisfied then the exam is graded and the score is displayed. 
        $total = 0;

        $query = "SELECT * FROM question";
        $result = mysqli_query($db, $query);

        $num_rows = mysqli_num_rows($result);
		$total = 0;
        for ($i = 0; $i < $num_rows; $i++) {
            $row = mysqli_fetch_assoc($result);
            $answer = $_POST['answer'.$i+1];
            $correct = $row['correct'];
			if($answer == $correct){
				$total++;
			}
        }
	//The score is the number of correctly answered questions. 
    print "Score: $total/5";

    //  Once the exam is graded, the user is marked as having taken the exam. 
    $query = "UPDATE user SET taken = 'yes', score = '$total' WHERE password = '$password';";
    mysqli_query($db, $query);
    }
    

    ?>
</body>

</html>