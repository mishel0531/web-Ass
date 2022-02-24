<?php
include "connection.php";
session_start();
$logged_in_status =  $_SESSION["logged_in_status"];
if(!$logged_in_status){
  header("Location: login.php");
}
$architect_id = $_POST['architect_id'];
$user_id = $_POST['user_id'];
$date = $_POST['date'];

$select_query = "SELECT * FROM bookings WHERE Date = '$date'";
$result = $conn->query($select_query);
    if($result->num_rows>0){
        header("Location: book_appointment.php?architect_id=$architect_id&user_id=$user_id&message=The date is already booked. Please book a different date.");
    }else{
        $sql = "INSERT INTO bookings (User_ID, Architect_ID, Date)
        VALUES ('$user_id', '$architect_id','$date')";
        if ($conn->query($sql) === TRUE) {
            header("Location: book_appointment.php?architect_id=$architect_id&user_id=$user_id");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
$conn->close();
?>