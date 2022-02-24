<?php
include "connection.php";
session_start();
    $email = $_POST["email_address"];
    $password = $_POST["password"];
    $sql = "SELECT ID, Email, Password FROM login_credentials WHERE Email = '$email' AND Password = '$password'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $user = $result->fetch_assoc();
        $_SESSION["user_id"] = $user["ID"];
        $_SESSION["email"] = $email;
        $_SESSION["logged_in_status"] = TRUE;
        header("Location: booking.php");
    }else{
        header("Location: login.php?message1=Invalid Username&message2=Invalid Password");
    }
    $conn->close();
?>