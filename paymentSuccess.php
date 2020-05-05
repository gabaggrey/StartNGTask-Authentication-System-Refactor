<?php
include_once("lib/header.php");
$userEmail = $_SESSION['email'];

if (isset($_GET['txref'])) {
    $ref = $_GET['txref'];
    $amount = ""; //Correct Amount from Server
    $currency = ""; //Correct Currency from Server

    $query = array(
        "SECKEY" => "FLWSECK_TEST-8a5ddaf06d3ff07b8ff085aae41a28bc-X",
        "txref" => $ref
    );

    $data_string = json_encode($query);

    $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);

    curl_close($ch);

    $resp = json_decode($response, true);

    $paymentStatus = $resp['data']['status'];
    $chargeResponsecode = $resp['data']['chargecode'];
    $chargeAmount = $resp['data']['amount'];
    $chargeCurrency = $resp['data']['currency'];
    $idTxref = $resp['data']['txref'];
    $created = $resp['data']['created'];

    $userPaymentObject =
        [
            "email" => $userEmail,
            "paymentStatus" => $paymentStatus,
            "chargeResponsecode" => $chargeResponsecode,
            "chargeAmount" => $chargeAmount,
            "chargeCurrency" => $chargeCurrency,
            "txref" => $idTxref,
            "transactionDate" => $created
        ];

    file_put_contents("db/payments/" . $userPaymentObject['txref'] . ".json", json_encode($userPaymentObject));

    $subject = "Payment was Successful";
    $message = "The payment of " . $chargeCurrency . $chargeAmount . " was successful";
    $headers = "From: no-reply @corona.edu" . "\r\n" . "CC: admin@corona.edu";

    $try = mail($userEmail, $subject, $message, $headers);


    if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
        // transaction was successful...
        // please check other things like whether you already gave value for this ref
        // if the email matches the customer who owns the product etc
        //Give Value and return to Success page
    } else {
        //Dont Give Value and return to Failure page
    }
} else {
    die('No reference supplied');
}

?>
<header>
    <h1>Corona International Schools</h1>
    <h3>Payment Success</h3>
</header>

<main>
    <p>The payment was a success</p>

    <?php
    $allUsersPayments = scandir("db/payments/");
    $countallUsersPayments = count($allUsersPayments);

    echo "<table ><tr><th>Your Payment History</th></tr>";
    echo "<tr><td>Amount</td><td>Transaction Date</td></tr>";

    for ($i = 2; $i < $countallUsersPayments; $i++) {
        $allUsersPayments[$i];

        $usersPayments = file_get_contents("db/payments/" . $allUsersPayments[$i], true);
        $userPaymentObject = json_decode($usersPayments);

        if ($userPaymentObject->email == $userEmail) {
            echo "<tr><td>" . ($userPaymentObject->chargeCurrency) . " " . ($userPaymentObject->chargeAmount) . "</td><td>" . ($userPaymentObject->transactionDate) . "</td></tr>";
        }
    }
    echo "</table>";

    ?>


</main>



<?php
include("lib/footer.php");
?>
</body>

</html>