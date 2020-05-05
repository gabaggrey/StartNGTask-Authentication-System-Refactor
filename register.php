<?php

include_once("lib/header.php");
require_once("functions/alert.php");
?>
<header>
    <h1>Corona International Schools</h1>
    <h3>Registration Page</h3>
</header>

<main>

    <section class="container-fluid">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form class="form-container" action="processRegister.php" method="POST">
                    <p><?php
                        print_alert();
                        ?>
                    </p>

                    <div class="form-group">
                        <label for="fullName">Full Name: </label><br>
                        <input <?php
                                if (isset($_SESSION['fullName'])) {
                                    echo "value=" . $_SESSION['fullName'];
                                }
                                ?> type="text" name="fullName" id="fullName" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender: </label><br>
                        <select name="gender" id="gender" class="form-control">
                            <?php
                            if (isset($_SESSION['gender'])) {
                                echo "value=" . $_SESSION['gender'];
                            }
                            ?>
                            <option value="">Choose your gender</option>
                            <option <?php
                                    if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female') {
                                        echo "selected";
                                    }
                                    ?>>Female</option>
                            <option <?php
                                    if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female') {
                                        echo "selected";
                                    }
                                    ?>>Male</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="designation">Designation: </label><br>
                        <select name="designation" id="designation" class="form-control">
                            <?php
                            if (isset($_SESSION['designation'])) {
                                echo "value=" . $_SESSION['designation'];
                            }
                            ?>
                            <option value="">Choose your status</option>
                            <option <?php
                                    if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Management') {
                                        echo "selected";
                                    }
                                    ?>>Management</option>
                            <option <?php
                                    if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Teaching staff') {
                                        echo "selected";
                                    }
                                    ?>>Teaching staff</option>
                            <option <?php
                                    if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Auxiliary staff') {
                                        echo "selected";
                                    }
                                    ?>>Auxilliary staff</option>
                            <option <?php
                                    if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Student') {
                                        echo "selected";
                                    }
                                    ?>>Student</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </section>
        </section>
    </section>
</main>



<?php
include("lib/footer.php");
?>
</body>

</html>