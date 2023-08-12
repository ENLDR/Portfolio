<?php
    include('functions.php');
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = sanitizeInput($_POST['name']);
        $email = sanitizeInput($_POST['email']);
        $phone = sanitizeInput($_POST['phone']);
        $message = sanitizeInput($_POST['message']);
    
        $errors = validateForm($name, $email, $phone);
    
        if (empty($errors)) {
            
            $conn = connectDatabase();
    
            
            $query = "INSERT INTO feedback (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
            if (mysqli_query($conn, $query)) {
                echo "Form submitted successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
    
            
            mysqli_close($conn);
        } else {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    }
    
    function sanitizeInput($input) {
        return htmlspecialchars(trim($input));
    }

    
?>