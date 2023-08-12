<?php
function validateForm($name, $email, $phone) {
    $errors = array();

    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "Only letters and spaces allowed in the name.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match("/^\d{10}$/", $phone)) {
        $errors[] = "Invalid phone number format.";
    }

    return $errors;
}

function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "portfolio";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}
?>
