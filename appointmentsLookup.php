<?php
session_start();

$allUsers = scandir("db/appointments/");

$countAllUsers = count($allUsers);

for ($i = 2; $i <$countAllUsers; $i++) {
    $allUsers[$i];

    $userString = file_get_contents("db/appointments/" . $allUsers[$i], true);
    $userObject = json_decode($userString);

    echo "<p>";
    echo "Name : ";
    print_r($userObject->Fullname);
    echo "</p>";


    echo "<p>";
    echo "Date of appointment : ";
    print_r($userObject->appointmentDate);
    echo "</p>";


    echo "<p>";
    echo "Nature of appointment : ";
    print_r($userObject->appointmentNature);
    echo "</p>";

    echo "<p>";
    echo "initial complaint : ";
    print_r($userObject->initialComplaint);
    echo "</p>";

    echo "<hr/>";



}
