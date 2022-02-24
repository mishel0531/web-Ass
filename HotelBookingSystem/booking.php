<?php
include "connection.php";
session_start();
$logged_in_status =  $_SESSION["logged_in_status"];
if(!$logged_in_status){
  header("Location: login.php");
}
$sql = "SELECT * FROM Architects";
$result = $conn->query($sql);
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
<a href="logout.php" style="color: blue; float:right; text-decoration:underline; font-weight:bold">Logout</a>
<?php
  if($result->num_rows>0){
    while($row = $result->fetch_assoc()) {
    $architect_id = $row["ID"];

    $sql2 = "SELECT * from architect_ratings WHERE Architect_ID = '$architect_id'";
    $result2 = $conn->query($sql2);
    $count = 0;
    $sum = 0;
    if($result2->num_rows>0){
      while($rating = $result2->fetch_assoc()) {
        $count++;
        $sum = $sum + $rating['Rating'];
      }
      $sub_total = $sum/$count;
    }else{
      $sub_total = 0;
    }
?>

<div class="card">
  <img src="WEB7.JPEG" alt="<?php echo $row["Name"] ?>" style="width:50%">
  <h1><?php echo $row["Name"] ?></h1>
  <p class="title"><?php echo $row["Qualifications"] ?></p>
  <div style="margin: 24px 0;">
  <br>
<center>


<?php if($sub_total<1) {?>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>(<?php echo $sub_total; ?>)
<?php }elseif($sub_total<1.5){?>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>(<?php echo $sub_total; ?>)
<?php }elseif($sub_total<2.5){?>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>(<?php echo $sub_total; ?>)
<?php }elseif($sub_total<3.5){?>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>(<?php echo $sub_total; ?>)
<?php }elseif($sub_total<4.5){?>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star"></span>(<?php echo $sub_total; ?>)
<?php }elseif($sub_total<=5){?>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>(<?php echo $sub_total; ?>)
<?php } ?>
<br><br>

<i class="material-icons"><a href="feedback.php?architect_id=<?php echo $architect_id ?>">Feedbacks (<?php
    echo $count;
  ?>)</a></i>
</center>

<div class="table">
<center><table style='margin-top: 20px; margin-bottom: 20px;'>
<tr>
<td ><button class ="button button1"onclick="window.location.href='#';">VIEW PROFILE</button></td>
</tr>
</table>
<tr>
<td style='text-align: center;'><button onclick="window.location.href='book_appointment.php?architect_id=<?php echo $architect_id ?>&user_id=<?php echo $_SESSION['user_id'] ?>';">BOOK APPOINTMENT</button></td>
</tr>

</table>
</div>
    <p><button onclick="document.location.href='contact_details.php?architect_id=<?php echo $architect_id ?>'">Contact</button></p>
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  
</div>

<br><br><br><br><br><br><br><br>

<?php
  }}
?>


<?php
$conn->close();
?>