<?php
    session_start();

    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    echo "<h3>";
    echo "Teachers : ";
    echo "</h3>";

    for ($i = 2; $i < $countAllUsers; $i++) {
        $allUsers[$i];

        $userString = file_get_contents("db/users/" . $allUsers[$i], true);
        $userObject = json_decode($userString);

        if($userObject->designation == "Teaching staff"){
            print_r($userObject->fullName);
        }
    }
    echo "<hr/>";


        echo "<h3>";
        echo "Auxiliary Staffs : ";
        echo "</h3>";

        for ($i = 2; $i < $countAllUsers; $i++) {
            $allUsers[$i];

            $userString = file_get_contents("db/users/" . $allUsers[$i], true);
            $userObject = json_decode($userString);

            if ($userObject->designation == "Auxilliary staff") {
                print_r($userObject->fullName);
            }
        }
    echo "<hr/>";

    echo "<h3>";
    echo "Students : ";
    echo "</h3>";

    for ($i = 2; $i < $countAllUsers; $i++) {
        $allUsers[$i];

        $userString = file_get_contents("db/users/" . $allUsers[$i], true);
        $userObject = json_decode($userString);

        if ($userObject->designation == "Student") {
            print_r($userObject->fullName);
        }
    }
    echo "<hr/>";

?>