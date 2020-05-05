<?php
session_start();

$allUsers = scandir("db/appointments/");

$countAllUsers = count($allUsers);

for ($i = 2; $i <$countAllUsers; $i++) {
    $allUsers[$i];

    $userString = file_get_contents("db/appointments/" . $allUsers[$i], true);
    $userObject = json_decode($userString);

    echo "<p>";
    echo "Name : ";
    print_r($userObject->Fullname);
    echo "</p>";


    echo "<p>";
    echo "Date of appointment : ";
    print_r($userObject->appointmentDate);
    echo "</p>";


    echo "<p>";
    echo "Nature of appointment : ";
    print_r($userObject->appointmentNature);
    echo "</p>";

    echo "<p>";
    echo "initial complaint : ";
    print_r($userObject->initialComplaint);
    echo "</p>";

    echo "<hr/>";



}


echo "<hr>";

 
    $allUsersPayments = scandir("db/payments/");
    $countallUsersPayments = count($allUsersPayments);

    echo "<table ><tr><th>All Payments</th></tr>";
    echo "<tr><td>Email Address</td><td>Amount</td><td>Transaction Date</td></tr>";

    for ($i = 2; $i < $countallUsersPayments; $i++) {
        $allUsersPayments[$i];

        $usersPayments = file_get_contents("db/payments/" . $allUsersPayments[$i], true);
        $userPaymentObject = json_decode($usersPayments);

            echo "<tr><td>" . ($userPaymentObject->email) . "</td><td>" . ($userPaymentObject->chargeCurrency) . " " . ($userPaymentObject->chargeAmount) . "</td><td>" . ($userPaymentObject->transactionDate) . "</td></tr>";
            echo "<br>";
    }
    echo "</table>";

    ?>