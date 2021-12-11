<!DOCTYPE html>
<html lang="en">

<head>
    <!-- The page has a title. -->
    <title>Compound Interest</title>
    <link rel='stylesheet' href='q10.css'>

</head>

<body>
    <header>Compound Interest Over Time</header><br>
    <!-- The user's inputs are processed by a php program. -->
    <?php
    $p = $_GET["principal"];
    $r = $_GET["rate"];
    $n = $_GET["years"];

    function compoundInterest($p, $r, $n)
    {
        return pow($p * (1 + ($r / 100)), $n);
    }

    // Then the user's inputs are displayed in an appropriate format.
    print "Principal Amount: $p <br>";
    print "Interest Rate $r <br>";
    print "Number of Years: $n <br>";

    // Then there is a table showing how the money grows with the time.
    // The table has two columns, one for year and one for money, and column headings. -->
    echo "<table>
        <tr>
            <th> Year </th>
            <th> Money </th>
        </tr>";

        for ($i = 0; $i < $n + 1; $i++) {
            $amount = CompoundInterest($p, $r, $i);

            echo "<tr> 
                        <td> $i </td>
                        <td> $ $amount </td>
                     </tr>";
        }
        
    echo "</table>";
    ?>
</body>


</html>