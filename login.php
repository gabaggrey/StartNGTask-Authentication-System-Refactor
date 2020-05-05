<?php
include_once("lib/header.php");
require_once("functions/alert.php");

?>
<header>
    <h1>Corona International Schools</h1>
    <h3>Login Page</h3>
</header>

<main>

    <section class="container-fluid">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <p><?php
                    print_alert();
                    ?>
                </p>
                <form class="form-container" method="POST" action="processLogin.php">

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" <?php
                                                                            if (isset($_SESSION['email'])) {
                                                                                echo "value=" . $_SESSION['email'];
                                                                            }
                                                                            ?> aria-describedby="emailHelp" name="email">

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
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