<?php

include_once("lib/header.php");

?>
<header>
    <h1>Corona International Schools</h1>

</header>

<main>
    <p>The payment was a success</p>

    <?php
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);


    for ($i = 2; $i <= $countAllUsers; $i++) {

        $userString = file_get_contents("db/users/" . $allUsers[$i], true);
        $userObject = json_decode($userString);

        if ($userObject->designation == "Student") {

            $allUsersPayments = scandir("db/payments/");
            $countallUsersPayments = count($allUsersPayments);

            $usersPayments = file_get_contents("db/payments/" . $allUsersPayments[$i], true);
            $userPaymentObject = json_decode($usersPayments);


                if ($userPaymentObject->email == $userObject->email) {
                    echo " finally";
                }
            }
        }
    

    ?>


</main>



<?php
include("lib/footer.php");
?>
</body>

</html>