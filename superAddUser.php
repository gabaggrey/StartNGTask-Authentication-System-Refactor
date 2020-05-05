<?php

include_once("lib/header.php");
require_once("functions/alert.php");
?>
<header>
    <h1>Corona International Schools</h1>
    <h3>Add new user</h3>
</header>

<main>

    <p><?php
        print_alert();
        ?></p>
    <section class="container-fluid">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form action="processSuperAddUser.php" method="POST" class="form-container">

                    <div class="form-group">
                        <label for="fullName">Full Name: </label><br>
                        <input <?php
                                if (isset($_SESSION['fullName'])) {
                                    echo "value=" . $_SESSION['fullName'];
                                }
                                ?> type="text" name="fullName" id="fullName" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email: </label><br>
                        <input <?php
                                if (isset($_SESSION['email'])) {
                                    echo "value=" . $_SESSION['email'];
                                }
                                ?> type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label><br>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender: </label><br>
                        <select name="gender" id="gender" class="form-control">
                            <?php
                            if (isset($_SESSION['gender'])) {
                                echo "value=" . $_SESSION['gender'];
                            }
                            ?>
                            <option value="">Choose user gender</option>
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
                            <option value="">Choose user status</option>
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

                    <button type="submit" class="btn btn-primary btn-block">Add User</button>

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