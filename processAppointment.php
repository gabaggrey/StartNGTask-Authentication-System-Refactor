<?php
    include_once("lib/header.php");
    $_SESSION['fullname'];

    $errorCount = 0;
//verifying input data

    $email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
    $appointmentDate = $_POST['appointmentDate'] != "" ? $_POST['appointmentDate'] : $errorCount++;
    $appointmentTime = $_POST['appointmentTime'] != "" ? $_POST['appointmentTime'] : $errorCount++;
    $appointmentNature = $_POST['appointmentNature'] != "" ? $_POST['appointmentNature'] : $errorCount++;
    $appointmentDept = $_POST['appointmentDept'] != "" ? $_POST['appointmentDept'] : $errorCount++;
    $initialComplaint = $_POST['initialComplaint'] != "" ? $_POST['initialComplaint'] : $errorCount++;

    $_SESSION['email'] = $email;
    $_SESSION['appointmentDate'] = $appointmentDate;
    $_SESSION['appointmentTime'] = $appointmentTime;
    $_SESSION['appointmentNature'] = $appointmentNature;
    $_SESSION['appointmentDept'] = $appointmentDept;
    $_SESSION['initialComplaint'] = $initialComplaint;

    if ($errorCount > 0) {
        $session_error = "You have " . $errorCount . " error";

        if ($errorCount > 1) {
            $session_error .= "s";
        }
        $session_error .= " in your submission";

        
        set_alert('error', $session_error);
        header("Location: bookAppointment.php");
    } else {
    $allUsers = scandir("db/appointments/");
    $countAllUsers = count($allUsers);

    $newUserId = $countAllUsers++;
    $newUserId--;

    $appointmentObject =
        [
            "id" => $newUserId,
        "email" => $email,
        "appointmentDate" => $appointmentDate,
        "appointmentTime" => $appointmentTime,
        "appointmentNature" => $appointmentNature,
        "appointmentDept" => $appointmentDept,
        "initialComplaint" => $initialComplaint,
        "Fullname" => $_SESSION['fullname']
        ];

    for ($i = 0; $i < $countAllUsers; $i++) {
        $currentUser = 0;
        $currentUser = $allUsers[$i];
        if ($currentUser == $_SESSION['email'] . ".json") {
            $_SESSION["error"] = "You have made an appointment already.";
            header("Location: generalDashboard.php");
            die();
        }
    }

    file_put_contents("db/appointments/" . $_SESSION['email'] . ".json", json_encode($appointmentObject));
    $_SESSION["message"] = "Appointment was made  Successfully, You will be contacted shortly";
    header("Location: generalDashboard.php");
}
?>



