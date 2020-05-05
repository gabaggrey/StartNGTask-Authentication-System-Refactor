<?php
include_once("lib/header.php");
$_SESSION['fullname'];
?>
<header>
    <h1>Corona International Schools</h1>
    <h3>This Dashboard is meant for Students and Auxiliary staffs</h3>

</header>

<main>
    <?php
        if(!isset($_SESSION['loggedIn'])){
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
        <a href="payschoolfees.php">
            <button type="button" class="btn btn-primary btn-lg">Pay School Fees Here</button>
        </a>

        <a href="bookAppointment.php">
            <button type="button" class="btn btn-primary btn-lg">Book Appointment</button>
        </a>


    </div>

</main>




<?php
include("lib/footer.php");
?>
</body>

</html>