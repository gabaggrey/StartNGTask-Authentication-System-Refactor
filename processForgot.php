<?php

session_start();
require_once("functions/alert.php");

$errorCount = 0;

// collecting and verifying the data, validation

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;

$_SESSION['email'] = $email;


if ($errorCount > 0) {
    $session_error = "You have " . $errorCount . " error";

    if ($errorCount > 1) {
        $session_error .= "s";
    }
    $session_error .= " in your submission";

    set_alert('error', $session_error );
    
    header("Location: forgot.php");
} else {
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    for ($i = 0; $i < $countAllUsers; $i++) {
        $currentUser = $allUsers[$i];
        if ($currentUser == $email . ".json") {

            //send email with code to the email provided
            //$to = "somebody@example.com";

            $token = "";
            $alphabets =  array_merge(range('a', 'z'), range('A', 'Z'));

            for ($i = 0; $i < 26; $i++) {
                //get random number
                //get element in alphabets at the index of the random number
                //add hat to the token string

                $index = mt_rand(0, count($alphabets));
                $token .= $alphabets[$index];
            }

            //token generation ends

            $subject = "Password Reset LINK";
            $message = "A password reset has been initiated from your account, if you did not initiate this reset please ignore. Otherwise, visit: localhost/coronaschools/reset.php?token=" . $token;
            $headers = "From: no-reply @corona.edu" . "\r\n" . "CC: admin@corona.edu";

            //insert user inputs into the database/ tokens
            file_put_contents("db/tokens/" . $email . ".json", json_encode(['token' => $token]));


            $try = mail($email, $subject, $message, $headers);
            if ($try) {
                //send success message
                $_SESSION["message"] = "Password reset email has been sent to : " . $email;
                header("Location: login.php");
            } else {
                //send error message 
                $_SESSION["error"] = "Something went wrong we could not send password reset to to " . $email;
                header("Location: forgot.php");
            }
            die();
        }
    }

    file_put_contents("db/users/" . $email . ".json", json_encode($userObject));
    $_SESSION["error"] = "Email not found ERR : " . $email;
    header("Location: forgot.php");
}
