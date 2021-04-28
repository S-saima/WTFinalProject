<?php

 session_start();
?>

<?php
$username = $password = "";
$usernameerr = $passworderr = "";

 if($_SERVER['REQUEST_METHOD'] == "POST") {

 if(empty($_POST['username'])) {
$usernameerr = "Please Fill up the Username!";
}
else
{
$username=$_POST['username'];
}

 if(empty($_POST['password'])) {
$passworderr = "Please Fill up the password!";
}

 else
{
$password=$_POST['password'];
}

 $username = $_POST['username'];
$password = $_POST['password'];

 if($usernameerr ==""&& $passworderr==""){


	$hostname = "localhost";
	$username = "user";
	$password = "123";
	$dbname = "finalproject1";

	// Mysqli Object-Oriented
	$conn1 = new mysqli($hostname, $username, $password, $dbname);

	if($conn1->connect_errno) {
		echo " Database Connection Failed!...";
		echo "<br>";
		echo $conn1->connect_error;
	}
	else {
		$_SESSION['username'] = $_POST['username'];
		$stmt = $conn1->prepare("select id, UserName, Password from userreg where UserName = ? AND Password = ?");
		$stmt->bind_param("ss", $p1 , $p2);
		$p1 = $_POST['username'];
		$p2 = $_POST['password'];
	     $stmt->execute();
		$res2 = $stmt->get_result();
		$user = $res2->fetch_assoc();
if($user){
	
    header("Location: SButton.php ");
exit();
	}
	else{

		echo "<br><br><b><center>Wrong user name or password";
		echo $conn1->error;
	}
  }

	$conn1->close();
//setcookie($username,$password,time()+60);

 //if(isset($_COOKIE[$username])){

//$_SESSION['user'] = $username;

}
}

?>
<!DOCTYPE html>
<html>
<head >
<title>Login </title>
<link rel="stylesheet" type="text/css" href="SLogin.css">

<body style="height: 100vh;background-size: cover; background-image:url(login3.jpg);">
<div class="loginbox">

<h1>LOGIN</h1>
<form name="jsForm" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"><b>


<p>Username</p>
<label for="username"></label>
<input type="text" name="username" id="username" value="<?php echo $username ?>">
<p><?php echo $usernameerr; ?></p>
<br><br>

 <p>Password</p>
<label for="password"></label>
<input type="password" id="password" name="password"
value="<?php echo $password ?>">
<?php echo $passworderr; ?><br><br>

 </b>
<input type="submit" value="Login"> 
<a href="ajaxsignin.html">Create account!!</a>

<h4 style="font-family: cooper black"><p id="errorMsg"></p></h4>
</font>
</head>
</form>
<script>
        function validate() {
            var isValid = false;
            var username = document.forms["jsForm"]["username"].value;
            var password = document.forms["jsForm"]["password"].value;
            

            if(username == "" || password == "") {
                document.getElementById('errorMsg').innerHTML = "<b> Please fill up the booking form properly";
                document.getElementById('errorMsg').style.color = "#990012";
            }
            else {
                isValid = true;
            }

            return isValid;
        }
    </script>

</body>
</html>