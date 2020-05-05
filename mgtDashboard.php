<?php
include_once("lib/header.php");

?>
<header>
    <h1>Corona International Schools</h1>
    <h3>This Dashboard is meant for Management and Teaching staffs</h3>

</header>

<main>
    <?php
    if (!isset($_SESSION['loggedIn'])) {
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
            <button type="button" class="btn btn-primary btn-lg">See All Appointments</button>
        </a>


    </div>

</main>


<?php
include("lib/footer.php");
?>

</body>

</html>