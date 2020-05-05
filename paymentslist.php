<?php

include_once("lib/header.php");

?>
<header>
    <h1>Corona International Schools</h1>
    <h3>Payment List</h3>
</header>

<main>

    <?php
    $allUsersPayments = scandir("db/payments/");
    $countallUsersPayments = count($allUsersPayments);

    echo "<table ><tr><th>All Payments</th></tr>";
    echo "<tr><td>Email Address</td><td>Amount</td><td>Transaction Date</td></tr>";

    for ($i = 2; $i < $countallUsersPayments; $i++) {
        $allUsersPayments[$i];

        $usersPayments = file_get_contents("db/payments/" . $allUsersPayments[$i], true);
        $userPaymentObject = json_decode($usersPayments);

            echo "<tr><td>" . ($userPaymentObject->email) . "</td><td>" . ($userPaymentObject->chargeCurrency) . " " . ($userPaymentObject->chargeAmount) . "</td><td>" . ($userPaymentObject->transactionDate) . "</td></tr>";
    }
    echo "</table>";

    ?>


</main>



<?php
include("lib/footer.php");
?>
</body>

</html>