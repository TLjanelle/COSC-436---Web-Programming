<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Orders</title>
    <link rel='stylesheet' href='restaurant.css'>
</head>

<body>
    <?php
    $db = mysqli_connect("127.0.0.1", "root", "", "restaurant");

    // get id from GET array
    $id = $_GET["id"];

    // delete the order with that id from orders
    $query = "DELETE FROM `orders` WHERE id = '$id'";
    mysqli_query($db, $query);

    //
    // select all rows from orders
    $query = "SELECT * FROM `orders`";
    $result = mysqli_query($db, $query);

    $num_rows = mysqli_num_rows($result);

    echo "<table>
        <tr>
            <th> Restaurant Orders </th>
        </tr>";

    // go through each row
    for ($i = 0; $i < $num_rows; $i++) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["id"];
        $name = $row["name"];
        $card = $row["card"];
        $address = $row["address"];
        $burger = $row["burger"];
        $pizza = $row["pizza"];
        $soda = $row["soda"];
        $cost = $row["cost"];

        // print id, burger, pizza, soda, name, card, address
        echo "<tr> <td>
                    Order ID: $id<br>
                    Name: $name<br>
                    Card Numer: $card<br>
                    Address: $address<br>
                    Items Ordered: ";
        if ($burger == 1) {
            print "Burger<br>";
        }

        if ($pizza == 1) {
            print "Pizza<br>";
        }

        if ($soda == 1) {
            print "Soda <br>";
        }
        echo "Cost: $$cost<br><br>
             </td> </tr>";
    }
    echo "</table>
        <form action='update.php' method='get/post'>
            <label for='id'></label><br>
            <input type='text' id='id' name='id'><br><br>

            <input type='submit' value='Complete Order'>
        </form>";
    ?>



</body>

</html>