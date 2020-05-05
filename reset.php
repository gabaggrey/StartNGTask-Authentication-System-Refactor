<?php
include_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/users.php");

if (!is_user_loggedIn() && !is_token_set()) {
    $_SESSION["error"] = "You are not authorize to view this page.";
    header("Location: login.php");
}
?>
<header>
    <h1>Corona International Schools</h1>
    <h3>Reset Password</h3>
</header>

<main>
    <section class="container-fluid">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <p><?php
                    print_alert()
                    ?>
                </p>

                <form class="form-container" method="POST" action="processReset.php">
                    <p>Reset password associated with your account</p>


                    <?php if (!is_user_loggedIn()) { ?>
                        <input <?php
                                if (is_token_set_in_session()) {
                                    echo "value='" . $_SESSION['token'] . "'";
                                } else {
                                    echo "value='" . $_GET['token'] . "'";
                                }
                                ?> type="hidden" name="token">
                    <?php } ?>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input <?php
                                if (isset($_SESSION['email'])) {
                                    echo "value=" . $_SESSION['email'];
                                }
                                ?> type="email" name="email" class="form-control" id="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Enter New Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
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