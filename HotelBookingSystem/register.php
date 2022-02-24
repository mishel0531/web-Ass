<?php
include "connection.php";
?>
<!DOCTYPE html>
<!--www.codingflicks.com--> 
<html lang="en">

<head>
	<meta charset="UTF-8">
	
	<link href="style.css" rel="stylesheet">
</head>

<style>
* {
	box-sizing: border-box;
}
body {
	font-family: poppins;
	font-size: 16px;
	color: #fff;
}

.form-box {
      
	background-color: rgba(0, 0, 0, 0.65);
	margin: auto auto;
	padding: 40px;
	border-radius: 5px;
	
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	width: 500px;
	height: 430px;
}
.form-box:before {
	background-image: url("https://i.postimg.cc/8cnYLpfc/ddddd.jpg");
	width: 100%;
	height: 100%;
	background-size: cover;
	content: "";
	position: fixed;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	z-index: -1;
	display: block;
	filter: blur(2px);
}
.form-box .header-text {
	font-size: 25px;
	font-weight: 600;
	padding-bottom: 30px;
	text-align: center;
}
.form-box input {
	margin: 10px 0px;
	border: none;
	padding: 10px;
	border-radius: 5px;
	width: 100%;
	font-size: 18px;
	font-family: poppins;
}
.form-box input[type=checkbox] {
	display: none;
}
.form-box label {
	position: relative;
	margin-left: 5px;
	margin-right: 10px;
	top: 5px;
	display: inline-block;
	width: 20px;
	height: 20px;
	cursor: pointer;
}
.form-box label:before {
	content: "";
	display: inline-block;
	width: 20px;
	height: 20px;
	border-radius: 5px;
	position: absolute;
	left: 0;
	bottom: 1px;
	background-color: #ddd;
}
.form-box input[type=checkbox]:checked+label:before {
	content: "\2713";
	font-size: 20px;
	color: #000;
	text-align: center;
	line-height: 20px;
}
.form-box span {
	font-size: 14px;
}
.form-box button {
	background-color: black;
	color: #fff;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	width: 100%;
	font-size: 18px;
	padding: 10px;
	margin: 20px 0px;
}
span a {
	color: white;
}
</style>
<body>

	<div class="form-box">
		<div class="header-text">
			Sign Up
		</div>

<form action="register_backend.php" method="post">
    <span style="color: red;">
        <?php
            if(!empty($_GET['message1'])){
                echo $_GET['message1'];
            }
        ?>
    </span>
	<input required name="email_address" placeholder="Your Email Address" type="text"> 
	<input required name="password" placeholder="Your Password" type="password"> <input required id="terms" name="terms_and_conditions" type="checkbox"/> 
<label for="terms"></label><span>Agree with <a href="#">Terms & Conditions <button type="submit">sign up</button>
                <a href="login.php">Already have an account? Login</a>
</form>
	</div>
</body>
</html>
<?php
$conn->close();
?>