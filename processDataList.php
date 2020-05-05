<?php
        session_start();
        $errorCount = 0;

        //verifying the data, validation

        $designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;

        $_SESSION['designation'] = $designation;

        //error message for login info
        if ($errorCount > 0) {
            $session_error = "You have " . $errorCount . " error";
            $session_error .= " in your submission";

            set_alert('error', $session_error);
            header("Location: superuser.php");
        }
        else {
            $allUsers = scandir("db/users/");
            $countAllUsers = count($allUsers);

            for ($i = 0; $i < $countAllUsers; $i++) {
                $currentUser = $allUsers[$i];

                    if ($currentUser == $email . ".json") {
                        //check password
                        $userString = file_get_contents("db/users/" . $email . ".json");
                        $userObject = json_decode($userString);
                        $passwordFromDb = $userObject->password;

                        
                        die();
                    }
                }
            }

            $_SESSION["error"] = "Invalid Email or Password";
            header("Location: login.php");
            die();
    
?>

