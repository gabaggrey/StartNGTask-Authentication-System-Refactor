<?php
include_once("lib/header.php");
require_once("functions/alert.php");
?>

<header>
    <h1>Corona International Schools</h1>
    <h3>Book an Appointment</h3>
</header>

<main>

    <section class="container-fluid">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form class="form-container" action="processAppointment.php" method="POST">
                    <p><?php
                        print_alert();
                        ?>
                    </p>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" <?php
                                                                            if (isset($_SESSION['email'])) {
                                                                                echo "value=" . $_SESSION['email'];
                                                                            }
                                                                            ?> aria-describedby="emailHelp" name="email">

                    </div>

                    <div class="form-group">
                        <label for="appointmentDate">Date of Appointment: </label>
                        <input type="date" <?php
                                            if (isset($_SESSION['appointmentDate'])) {
                                                echo "value=" . $_SESSION['appointmentDate'];
                                            }
                                            ?> id="appointmentDate" name="appointmentDate" class="form-control">


                    </div>
                    <div class="form-group">
                        <label for="appointmentTime">Time of Appointment : </label>
                        <input type="time" <?php
                                            if (isset($_SESSION['appointmentTime'])) {
                                                echo "value=" . $_SESSION['appointmentTime'];
                                            }
                                            ?> id="appointmentTime" name="appointmentTime" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="appointmentNature"></label>

                        <select name="appointmentNature" id="appointmentNature" class="form-control" <?php
                                                                                                        if (isset($_SESSION['appointmentNature'])) {
                                                                                                            echo "value=" . $_SESSION['appointmentNature'];
                                                                                                        }
                                                                                                        ?>>
                            <option>Choose the nature of the appointment</option>
                            <option <?php
                                    if (isset($_SESSION['appointmentNature']) && $_SESSION['appointmentNature'] == 'Official') {
                                        echo "selected";
                                    }
                                    ?>>Official</option>
                            <option <?php
                                    if (isset($_SESSION['appointmentNature']) && $_SESSION['appointmentNature'] == 'Private') {
                                        echo "selected";
                                    }
                                    ?>>Private</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="appointmentDept"></label>

                        <select name="appointmentDept" id="appointmentDept" class="form-control" <?php
                                                                                                    if (isset($_SESSION['appointmentDept'])) {
                                                                                                        echo "value=" . $_SESSION['appointmentDept'];
                                                                                                    }
                                                                                                    ?>>
                            <option>Choose the nature of the appointment</option>
                            <option <?php
                                    if (isset($_SESSION['appointmentDept']) && $_SESSION['appointmentDept'] == 'Management') {
                                        echo "selected";
                                    }
                                    ?>>Management</option>
                            <option <?php
                                    if (isset($_SESSION['appointmentDept']) && $_SESSION['appointmentDept'] == 'Management') {
                                        echo "selected";
                                    }
                                    ?>>Teaching staff</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="initialComplaint"></label>
                        <textarea name="initialComplaint" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </section>
        </section>
    </section>
</main>