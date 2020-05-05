<?php

    session_start();

    $errorCount = 0;

    if(!$_SESSION['loggedIn']){
        $token = $_POST['token'] != "" ? $_POST['token'] : $errorCount++;
        $_SESSION['token'] = $token;

    } 

    $email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
    $password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

    $_SESSION['email'] = $email;

    if ($errorCount > 0) {
        $session_error = "You have " . $errorCount . " error";

        if ($errorCount > 1) {
            $session_error .= "s";
        }

        $session_error .= " in your submission";
        
        set_alert('error', $session_error);

        header("Location: reset.php");
    } else {
        //read the contents of a folder
        $allUserTokens = scandir("db/tokens/");
        $countAllUserTokens = count($allUserTokens);

        for ($i = 0; $i < $countAllUserTokens; $i++) 
        {
            $currentTokenFile = $allUserTokens[$i];
            if ($currentTokenFile == $email . ".json") 
            {
                //check if the token in the currentTokenFile is the same as $token
                // echo "work in process";

                $tokenContent = file_get_contents("db/tokens/". $currentTokenFile);
                $tokenObject = json_decode($tokenContent);
                $tokenFromDB = $tokenObject->token;

                if($_SESSION['loggedIn']){
                    $checkToken = true;
                }else{
                    $checkToken = $tokenFromDB == $token;
                }

                if($checkToken){

                $allUsers = scandir("db/users/");
                $countAllUsers = count($allUsers);
                
                for($counter = 0; $counter < $countAllUsers; $counter++)
                {
                    $currentUser = $allUsers[$counter];

                    if($currentUser == $email.".json")
                    {
                        $userString = file_get_contents("db/users/" . $currentUser);
                        $userObject = json_decode($userString);
                        $userObject->password = password_hash($password, PASSWORD_DEFAULT);

                        unlink("db/users/" . $currentUser);  //delete user file
                        file_put_contents("db/users/" . $email . ".json", json_encode($userObject));

                        $subject = "Password Reset Successful";
                        $message = "Your account on CoronalSchools.edu has just been updates, you password has been changed . If you didn't initiate the password change, please visit corona.edu and reset your password immediately";
                        $headers = "From: no-reply @corona.edu" . "\r\n" . "CC: admin@corona.edu";

                        $try = mail($email, $subject, $message, $headers);

                        $_SESSION["message"] = "Password Reset Successful. You can now login";
                        header("Location: login.php");
                        die();
                    }
                }
            }
            }
        }
        $_SESSION["error"] = "Password Reset Failed, token/email invalid or expired";
        header("Location: login.php");
    }

?>
