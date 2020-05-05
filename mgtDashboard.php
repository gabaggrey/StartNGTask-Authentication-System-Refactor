<?php
include_once("lib/header.php");
require_once("functions/users.php");

?>
<header>
    <h1>Corona International Schools</h1>
    <h3>This Dashboard is meant for Management and Teaching staffs</h3>

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
    <br>
    <br>

    <div class="container">

        <a href="appointmentsLookup.php">
            <button type="button" class="btn btn-primary btn-lg">See All Appointments and those who have paid </button>
        </a>
<!--         
        <a href="schoolpaymentslookup.php">
            <button type="button" class="btn btn-primary btn-lg">Click to see who has paid and who has paid</button>
        </a> -->


    </div>

</main>e


<?php
include("lib/footer.php");
?>

</body>

</html>