<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer Confirmation</title>
    <link rel='stylesheet' href='restaurant.css'>
</head>

<body>
    <!-- print confirmation message -->
    <h1>Your order has been received!</h1>

    <?php
    $db = mysqli_connect("127.0.0.1", "root", "", "restaurant");

    error_reporting(0);
    $cost = 0;
    // get burger, pizza, soda information for GET array
    $burger = $_GET["burger"];
    $pizza = $_GET["pizza"];
    $soda = $_GET["soda"];

    if ($burger == "on") {
        $burger = true;
        $cost += 10;
    } else {
        $burger = false;
    }

    if ($pizza == "on") {
        $pizza = true;
        $cost += 5;
    } else {
        $pizza = false;
    }

    if ($soda == "on") {
        $soda = true;
        $cost += 2;
    } else {
        $soda = false;
    }

    // get name, card, address from GET array
    $name = $_GET["name"];
    $card = $_GET["card"];
    $address = $_GET["address"];

    // insert name, card, addres, burger, pizza, soda into orders
    $query = "INSERT INTO orders(name, card, address, burger, pizza, soda, cost) VALUES ('$name', '$card', '$address', '$burger', '$pizza', '$soda', '$cost')";
    $result = mysqli_query($db, $query);

    $query = "SELECT * FROM `orders`";
    $result = mysqli_query($db, $query);

    $num_rows = mysqli_num_rows($result);
    for ($i = 0; $i < $num_rows; $i++) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["id"];
        $name = $row["name"];
        $card = $row["card"];
        $address = $row["address"];
        $burger = $row["burger"];
        $pizza = $row["pizza"];
        $soda = $row["soda"];
    }

    // print in table format
    echo    "<table>
                    <tr>
                        <th>Order No</th>
                        <th>Name</th>
                        <th>Card</th>
                        <th>Address</th>
                        <th>Food Items</th>
                        <th>Cost</th>
                    </tr>
                    <tr> 
                        <td>$id</td>
                        <td>$name</td>
                        <td>$card</td>
                        <td>$address</td>
                        <td>";
    if ($burger == 1) {
        print "Burger <br>";
    }

    if ($pizza == 1) {
        print "Pizza <br>";
    }

    if ($soda == 1) {
        print "Soda <br>";
    }
    echo "</td>
                        <td>$cost</td>
                    </tr>
            </table>";
    ?>


</body>

</html>