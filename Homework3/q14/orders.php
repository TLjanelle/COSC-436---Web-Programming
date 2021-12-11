<!-- The restaurant worker must have a password to retrieve the orders. The
worker enters the password. The program checks the password. If it is valid then the orders are
displayed. Otherwise an error message is displayed. The orders are displayed in a table format
with one column. Each row has one order which includes the food items, total cost, name, credit
card number, and address each in a separate line. Each order also has an automatically generated
id at the top. There is a text box and an update button below the table of orders. When the
restaurant completes an order, the worker enters the order id in the text box and updates. The
completed order is immediately removed. The three food items and their prices are fixed. Store
the restaurant password in the database. Use appropriate layout/css style. 
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employee Login</title>
    <link rel='stylesheet' href='restaurant.css'>
</head>

<body>
    <?php
    $db = mysqli_connect("127.0.0.1", "root", "", "restaurant");

    // get user's pwd from GET array
    $password = $_POST["password"];

    // retrieve pwd form password
    // check with user's pwd
    $query = "SELECT 'password' FROM passwords WHERE PASSWORD = '$password'";
    $results = mysqli_query($db, $query);

    // no match, say invalid pwd
    if (mysqli_num_rows($results) == 0) {
        print("Password is invalid, please enter a valid password");
    } else {

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
    }
    ?>
</body>

</html>