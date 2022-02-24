<?php
include "connection.php";
session_start();
$logged_in_status =  $_SESSION["logged_in_status"];
if(!$logged_in_status){
  header("Location: login.php");
}
$architect_id = $_GET['architect_id'];
$user_id = $_GET['user_id'];
$sql = "SELECT * from Architects WHERE ID = '$architect_id'";
$result = $conn->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
}else{
    echo "No Results";
} 
$bookings_sql = "SELECT * FROM bookings WHERE Architect_ID = '$architect_id'";
$bookings_sql_results = $conn->query($bookings_sql);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 800px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: black;
  text-align: center;
  cursor: pointer;
  width: 50%;
  font-size: 10px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

.checked {
  color: gold;
}
button{
background-color: black;
margin: 20px 0px 0px 20px;
text-align: center;
font-size: 15px;
border-radius: 10px;
border: 2px solid #366473;
padding: 12px 100px;
outline: none;
color: white;
cursor: pointer;
transition: 0.25px;
}
.button1{
background-color: white;
  color: black;
  border: 3px solid black;
  width:100%;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<div class="card">
    <a style="color: blue; text-decoration: underline; float: left;" href="booking.php">Back</a>
  <img src="WEB11.JPEG" alt="<?php echo $row['Name']; ?>" style="width:50%">
  <h1>Book <?php echo $row['Name']; ?></h1>

  <center>
      <form action="book_appointment_backend.php" method="POST">
          <input hidden type="text" name="architect_id" value="<?php echo $architect_id ?>"/>
          <input hidden type="text" name="user_id" value="<?php echo $user_id ?>"/>
          <input type="date" name="date" required/>
          <input type="submit" value="Book"/>
          <?php if($_GET['message']){ ?><br/>
                <span style="color: red;">* <?php echo $_GET['message'] ?></span>
            <?php }?>
      </form>
<?php
if($bookings_sql_results->num_rows>0){
?>
<h2 style="text-decoration: underline;">Current Bookings</h2>
  <table>
    <?php
        while($booking_row = $bookings_sql_results->fetch_assoc()) {
    ?>
      <tr>
            <td><?php echo $booking_row['Date']?></td>
      </tr>
    <?php }?>
  </table><br/>
  </center>
  <?php }?>
  
<br/>
    
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  
</div>
</body>
<?php
$conn->close();
?>