<?php
include_once("lib/header.php");


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
                    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
                        echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
                        session_destroy();
                    }
                    ?>
                </p>
                <form class="form-container" method="POST" action="processLogin.php">
                    <p><?php
                        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                            echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                            session_destroy();
                        } ?>
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