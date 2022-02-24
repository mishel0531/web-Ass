<?php
include "connection.php";
session_start();
$logged_in_status =  $_SESSION["logged_in_status"];
if(!$logged_in_status){
  header("Location: login.php");
}
$architect_id = $_GET['architect_id'];
$sql = "SELECT * FROM architect_ratings WHERE Architect_ID = '$architect_id'";
$rating_results = $conn->query($sql);

$sql2 = "SELECT * FROM Architects WHERE ID = '$architect_id'";
$architect_results = $conn->query($sql2);
if($architect_results->num_rows>0){
    $architect = $architect_results->fetch_assoc();
}else{
    echo "No Results";
}

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
  <img src="WEB11.JPEG" alt="<?php echo $architect['Name']; ?>" style="width:50%">
  <h1><?php echo $architect['Name']; ?></h1>

  <center>

    <form method="POST" action="feedback_backend.php">
        <input type="text" name="architect_id" value="<?php echo $architect['ID'] ?>" hidden/>
        <input type="text" name="user_id" value="<?php echo $_SESSION["user_id"] ?>" hidden/>
        <input max=5 style="width: 50px;" type="number" name="rating"/>
        <textarea name="feedback">

        </textarea>
        <input type="submit" value="Submit"/>
    </form>
    <hr/>
  <table>
      <?php
        if($rating_results->num_rows>0){
            while($row = $rating_results->fetch_assoc()) {
      ?>
      <tr>
        <td>
            <?php
                $user_id = $row['User_ID'];
                $user_sql = "SELECT * FROM login_credentials WHERE ID = '$user_id'";
                $user_result = $conn->query($user_sql);
                $user = $user_result->fetch_assoc();
                echo $user['Email'];
            ?>
        </td>
        <td>:</td>
        <td>
            <?php
                echo $row['Feedback'];
            ?>
        </td>
        <td>
            <?php
                if($row['Rating']==0){
            ?>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>(<?php echo $row['Rating'] ?>)

            <?php }elseif($row['Rating']==1){ ?>

            <span class="fa fa-star checked"></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>(<?php echo $row['Rating'] ?>)

            <?php }elseif($row['Rating']==2){ ?>

            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>(<?php echo $row['Rating'] ?>)

            <?php }elseif($row['Rating']==3){ ?>

            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>(<?php echo $row['Rating'] ?>)

            <?php }elseif($row['Rating']==4){ ?>

            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star "></span>(<?php echo $row['Rating'] ?>)

            <?php }elseif($row['Rating']==5){ ?>

            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>(<?php echo $row['Rating'] ?>)

            <?php }?>
        </td>
      </tr>
      <?php
       }
    }
      ?>
  </table><br/>
  </center>
  
  

    
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