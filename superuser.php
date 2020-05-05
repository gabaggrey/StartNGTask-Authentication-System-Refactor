<?php

include_once("lib/header.php");
?>
<header>
    <h1>Corona International Schools</h1>

</header>

<main>
    <p><?php
        if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
            echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
            session_destroy();
        }
        ?>
    </p>

    <a href="superAddUser.php">
        <button type="button" class="btn btn-primary btn-lg">Add User</button>
    </a>
    <a href="">
        <button type="button" class="btn btn-primary btn-lg">Print out </button>
    </a>

    <section class="container-fluid">
        <section class="row">
            <section class="col-12 col-sm-6 col-md-3">
                <form class="form-container" action="processDataList.php" method="POST">
                    <p><?php
                        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                            echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                            session_destroy();
                        } ?>
                    </p>

                    <div class="form-group">
                        <label for="designation">Pick a Designation to view its members: </label><br>
                        <select name="designation" id="designation" class="form-control">
                            <?php
                            if (isset($_SESSION['designation'])) {
                                echo "value=" . $_SESSION['designation'];
                            }
                            ?>
                            <option value="">Choose a designation</option>
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
                                    ?>>Auxiliary staff</option>
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