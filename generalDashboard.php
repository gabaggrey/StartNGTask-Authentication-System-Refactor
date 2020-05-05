<?php
include_once("lib/header.php");
require_once("functions/users.php");

$user_email = $_SESSION['email'];
$randum_number = rand(100, 900000000);


?>
<header>
    <h1>Corona International Schools</h1>
    <h3>This Dashboard is meant for Students and Auxiliary staffs</h3>

</header>

<main>
    <?php
    if (!is_user_loggedIn()) {
        header("Location: login.php");
    }

    ?>

    <p>We offer the best education for today's kids</p>

    Logged User ID : <?php print_r($_SESSION['loggedIn']); ?><br>
    Designation: <?php print_r($_SESSION['designation']); ?><br>
    Date of Registration : <?php print_r($_SESSION['reg_time']); ?><br>
    Last Login Date : <?php print_r($_SESSION['userLoginDate']); ?><br>
    Last Login Time: <?php print_r($_SESSION['userLoginTime']); ?><br>

    <hr>
    <br><br>
    <p><?php
        if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
            echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
            session_destroy();
        }
        ?>
    </p>
    <p><?php
        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
            // session_destroy();
        } ?>
    </p>
    <div class="container">
        <a href="bookAppointment.php">
            <button type="button" class="btn btn-primary btn-lg">Book Appointment</button>
        </a>

        <a href="payschoolfees.php">
            <button type="button" class="btn btn-primary btn-lg">Pay school fees</button>
        </a>
<!-- 
        <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
        <button type="button" class="btn btn-primary btn-lg" onClick=" payWithRave()">Click to pay School fees</button>


        <script>
            const API_publicKey = "FLWPUBK_TEST-d7809b70805e857f17208a287327a193-X";

            function payWithRave() {
                var x = getpaidSetup({
                    PBFPubKey: API_publicKey,
                    customer_email: <?php echo json_encode($user_email) ?>, ///email issue here
                    amount: 0,
                    customer_phone: "",
                    currency: "NGN",
                    txref: "rave-<?php echo json_encode($randum_number) ?>",
                    meta: [{
                        metaname: "flightID",
                        metavalue: "AP1234"
                    }],
                    onclose: function() {},
                    callback: function(response) {
                        var txref = response.data.txRef; // collect txRef returned and pass to a server page to complete status check.
                        console.log("This is the response returned after a charge", response);
                        if (
                            response.respcode == "00" ||
                            response.data.data.status == "successful"
                        ) {
                            // redirect to a success page
                                
                            window.location.href = "paymentSuccess.php";
                        } else {
                            // redirect to a failure page.
                            window.location.href = "paymentFailed.php";

                        }

                        x.close(); // use this to close the modal immediately after payment.
                    }
                });
            }

           
        </script>
 -->





    </div>

</main>




<?php
include("lib/footer.php");
?>
</body>

</html>