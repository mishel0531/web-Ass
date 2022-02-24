<?php
session_start();
include "connection.php";
$architect_id = $_POST["architect_id"];
$user_id = $_POST["user_id"];
$rating = $_POST["rating"];
$feedback = $_POST["feedback"];

$sql = "INSERT INTO architect_ratings (Architect_ID, User_ID, Rating, Feedback)
        VALUES ('$architect_id', '$user_id','$rating','$feedback')";
if ($conn->query($sql) === TRUE) {
    header("Location: feedback.php?architect_id=$architect_id");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>