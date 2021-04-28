<?php 
session_start();
?>

<?php
$username = $password = $Newpass = $conpass = "";
$usernameerr = $passworderr = $Newpasserr = $conpasserr = "";

 if($_SERVER['REQUEST_METHOD'] == "POST") {

if(empty($_POST['username'])) {
$usernameerr = "Please Fill up the username!";
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

if(empty($_POST['Newpass'])) {
$Newpasserr = "Please fill up the New password!";
}

 else
{
$Newpass=$_POST['Newpass'];
}


 if(empty($_POST['conpass'])) {
$conpasserr = "Please fill up the confirm password!";
}

 else
{
$conpass=$_POST['conpass'];
}

if($usernameerr ==""&& $passworderr=="" && $Newpasserr=="" && $conpasserr==""){

        $username = $_POST['username'];
        $password=$_POST['password'];
        $Newpass=$_POST['Newpass'];
        $conpass=$_POST['conpass'];

 if($Newpass== $conpass){
    $hostname = "localhost";
    $username = "user";
    $password = "123";
    $dbname = "finalproject1";

    $conn1 = mysqli_connect($hostname, $username, $password, $dbname);
    if(mysqli_connect_error()) {
        echo " Database Connection Failed!...";
        echo "<br>";
        echo mysqli_connect_error();

 }
 else{
  if($_POST['username'] == $_SESSION['username']){
   
  
        
    $stmt1 = mysqli_prepare($conn1, "update userreg set password = ? where UserName = ? ");
    mysqli_stmt_bind_param($stmt1, "ss", $p1, $p2  );
    $p2 = $_POST['username'];
    $p1 = $_POST['Newpass'];
    $res = mysqli_stmt_execute($stmt1);

 

    if($res) {
      echo "Data Update Successful!";
      header("Location: SButton.php ");
            exit();
    }
    else {
      echo "Failed to Update Data.";
      echo "<br>";
      echo $conn1->error;
    }
 

  
}

 else{
    $usernameerr= "Type your own username";
  }
}
  mysqli_close($conn1);
 

}
else{
	$conpasserr="Password does not match";
}
}
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Pass change</title>
</head>
<body  background= "password.jpg">
<center>
	<h2 style="color: white;"><b><?php echo "Welcome " . $_SESSION['username'] ?></b> </h2>
<h1 style="text-align:centre; color: white; size: 1500px">Change Password</h1>
</center>

<font size="5"; color="pink">
<form name="jsForm" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"><b>
	<br>


 <fieldset >


 <center>
<br>
<label for="username">User Name:</label>
<input type="username" name="username" id="username">
<h5 style="color: red">
<?php echo $usernameerr; ?>
</h5>
<br>

<label for="password">Current Password:</label>
<input type="password" name="password" id="password">
<h5 style="color: red">
<?php echo $passworderr; ?>
</h5>
<br>





<label for="Newpass">New Password:</label>
<input type="password" name="Newpass" id="Newpass">
<h5 style="color: red">
<?php echo $Newpasserr; ?>
</h5>
<br>



<label for="conpass">Confirm Password:</label>
<input type="password" name="conpass" id="conpass">
<h5 style="color: red">
<?php echo $conpasserr; ?>
</h5>


</center>

 </fieldset></b>
<center>
<input style="font-family: 'Cooper Black'; font-size : 15px; color: black; size: 1500px" type="submit" value="Ok">
<p id="errorMsg"></p>

</center>
</form>
</font>

<script>
        function validate() {
            var isValid = false;
            var UserName = document.forms["jsForm"]["username"].value;
            var Password = document.forms["jsForm"]["password"].value;
            var Newpass = document.forms["jsForm"]["Newpass"].value;
            var ConfirmPass = document.forms["jsForm"]["conpass"].value;

            if(UserName == "" || Password == "" || Newpass == "" || ConfirmPass == "") {
                document.getElementById('errorMsg').innerHTML = "<b>Please fill up the Password Change form properly";
                document.getElementById('errorMsg').style.color = "#8C001A";
            }
            else {
                isValid = true;
            }

            return isValid;
        }
    </script>

</body>
</html>