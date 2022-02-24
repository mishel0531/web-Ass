<?php
include "connection.php";
$email_address = $_POST["email_address"];
$password = $_POST["password"];
$sql = "SELECT ID, Email, Password FROM login_credentials WHERE Email = '$email_address'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        header("Location: register.php?message1=This Email address has already been used. Please use a different Email.");
    }else{
        $sql = "INSERT INTO login_credentials (Email, Password)
        VALUES ('$email_address', '$password')";

        if ($conn->query($sql) === TRUE) {
            header("Location: login.php?message1=Please enter your email address and password to login");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
$conn->close();
?>