<?php
    session_start();
    require_once("functions/users.php");
    
    $errorCount = 0;

    // collecting and verifying the data, validation

    if($_POST['fullName'] == ""){
            $errorCount++;
    }
    elseif(1 === preg_match('/[0-9]/', $_POST['fullName'])){
        $errorCount++;
    }
    elseif(strlen($_POST['fullName']) < 2){
        $errorCount++;
    }else{
        $fullName = $_POST['fullName'];
    }

    if ($_POST['email'] == "") 
    {
        $errorCount++;
    } 
    elseif (1 != preg_match('/(@)(.)/', $_POST['email'])) 
    {
        $errorCount++;
    } 
    elseif (strlen($_POST['email']) < 5) 
    {
        $errorCount++;
    } else 
    {
        $email = $_POST['email'];
    }

    $password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
    $gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
    $designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;

    //registration time
    $reg_time = date("Y-m-d");

    $_SESSION['fullName'] = $fullName;
    $_SESSION['email'] = $email;
    $_SESSION['gender'] = $gender;
    $_SESSION['reg_time'] = $reg_time;

    if ($errorCount > 0) 
    {
        $session_error = "You have " . $errorCount . " error";

        if ($errorCount > 1) 
        {
            $session_error .= "s";
        }
        $session_error .= " in your submission";

        
        set_alert('error', $session_error);
        header("Location: register.php");
        
    } else 
    {
       
        $newUserId = $countAllUsers++;
        $newUserId--;

        $userObject =
            [
                "id" => $newUserId,
                "fullName" => $fullName,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_DEFAULT),
                "gender" => $gender,
                "designation" => $designation,
                "reg_time" => $reg_time
            ];

            $userExists = find_user();
            
            if ($userExists)
            {
                $_SESSION["error"] = "Registration failed, User already exists";
                header("Location: register.php");
                die();
            }
         

        save_user($userObject);

        $_SESSION["message"] = "Registration Successful";
        header("Location: login.php");
        
    }

?>
