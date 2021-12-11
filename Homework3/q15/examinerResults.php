<!DOCTYPE html>
<html lang="en">

<head>
    <title> Exam Results </title>
    <link rel='stylesheet' href='q15.css'>
</head>

<body>

    <?php
    $db = mysqli_connect("localhost", "root", "", "exam");
    $password = $_POST['password'];
    $query = "SELECT `password` FROM `passwords` WHERE PASSWORD = '$password'";
    $results = mysqli_query($db, $query);

    // The program again checks whether the passcode is valid 
    if (mysqli_num_rows($results) == 0) {
        //An error message is displayed indicating invalid password
        print("Password is invalid, please enter a valid password");
    } else {
        //If it is valid then the exam results are displayed
        echo "<header>Exam Results</header><br>";

        $query = "SELECT * FROM user";
        $result = mysqli_query($db, $query);
        $num_rows = mysqli_num_rows($result);

        // The exam results are displayed in a table format with four columns.
        echo
        "<table>";
		echo
            "<tr>
                <th>Username</th>
                <th>Passcode</th>
                <th>Completed</th>
                <th>Score</th>
            </tr>";
        for ($i = 0; $i < $num_rows; $i++) {
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
            $passcode = $row['password'];
            $completed = $row['taken'];
            $score = $row['score'];

            // Each row has the user name, passcode, exam completed or not, and score.
            // The score is the number of correctly answered questions.
            echo
            "<tr>
                <td>$username</td>
                <td>$passcode</td>
                <td>$completed</td>
                <td>$score</td>
            </tr>";
        }
        echo
        "</table";
    }
    ?>
</body>

</html>