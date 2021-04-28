<?php
session_start();
?>

<?php
$username = $BookingDate = "";
$usernameerr = $BookingDateerr = "";

 if($_SERVER['REQUEST_METHOD'] == "POST") {

 if(empty($_POST['username'])) {
$usernameerr = "Please Fill up the Username!";
}
else
{
$username=$_POST['username'];
}

 if(empty($_POST['BookingDate'])) {
$BookingDateerr = "Please fill up the booking time!";
}

 else
{
$BookingDate=$_POST['BookingDate'];
}

if($usernameerr =="" &&$BookingDateerr==""){
 $username = $_POST['username'];
 $BookingDate=$_POST['BookingDate'];
 

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
    else {
        if($_POST['username'] == $_SESSION['username']){

        $stmt1 = mysqli_prepare($conn1, "insert into vip (UserName,BookingDate,PrivatePool,PrivateDinning,DVDPlayer,AC,Barbeque,SonyPlayStation) values (?, ?, ?, ?,?, ?, ?, ?)");
        mysqli_stmt_bind_param ($stmt1, "ssssssss", $a1, $a2, $a3, $a4,$a5, $a6, $a7, $a8);
         
        $a1 = $_POST['username'];
        $a2 = $_POST['BookingDate'];
        $a3 = $_POST['vip1'];
        $a4 = $_POST['vip2'];
        $a5 = $_POST['vip3'];
        $a6 = $_POST['vip4'];
        $a7 = $_POST['vip5'];
        $a8 = $_POST['vip6'];

        $res = mysqli_stmt_execute($stmt1);

        if($res) {
            echo "Data Inserted Successfully!";
        
        header("Location: SButton.php ");
        exit();
        }
        else {
            echo "Failed to Insert Data.";
            
        }
    
    }
    else{

        $usernameerr="Input your own username";
    }
 }
 mysqli_close($conn1);
 
}

}

?>

<!DOCTYPE html>
<html lang="eng" dir="ltr">
<head>
<meta charset="utf-8">
<title>VIP</title>
<link rel="stylesheet" href="VipReq.css">
</head>
<body>
    <div class="special">
     <ul>
  <li><a href="VipGallery.php">VIP Room</a></li>
</ul>
    </div>
    <center>
      <form name="jsForm" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"><b>
       
    <div class="vip" style="width: 420px;height: 650px;">
      <h4 style="color: black; font-family: cooper black;"><b><?php echo "Welcome " . $_SESSION['username'] ?></b> </h4>
        <h1>For Only VIP</h1>
        

        <p>User Name:</p>
<label for="username"></label>
<input type="text" name="username" id="username" value="<?php echo $username ?>">
<h5 style="color: #8C001A">
<?php echo $usernameerr; ?></h5>


<p>Booking Date:</p>
<label for="BookingDate"></label>
<input type="Date" id="BookingDate" name="BookingDate"
value="<?php echo $BookingDate ?>">
<h5 style="color: #8C001A">
<?php echo $BookingDateerr; ?><br>
</h5>

        <h3>Which Type Of Facilities Do You Need?</h3>
        <h4>
    <label class="container">Private Heated Swimming Pool
  <input type="checkbox" name="vip1"  >
  <span class="checkmark"></span>
</label>


</h4>

<h4>
    <label class="container">Private Dinning Area
  <input type="checkbox" name="vip2"  >
  <span class="checkmark"></span>
</label>


</h4>

<h4>
    <label class="container">CD & DVD Players
  <input type="checkbox" name="vip3"  >
  <span class="checkmark"></span>
</label>


</h4>

<h4>
    <label class="container">Air Conditioning
  <input type="checkbox" name="vip4"  >
  <span class="checkmark"></span>
</label>


</h4>


<h4>
    <label class="container">Barbeque
  <input type="checkbox" name="vip5"  >
  <span class="checkmark"></span>
</label>


</h4>

<h4>
    <label class="container">Sony Playstation 4
  <input type="checkbox" name="vip6"  >
  <span class="checkmark"></span>
</label>


</h4>

 
   <br>
   
    <input type="submit" value="Send">
<p id="errorMsg"></p>

 
</font>

</form>
</div>
</center>


 </header>

<script>
        function validate() {
            var isValid = false;
            var username = document.forms["jsForm"]["username"].value;
            var BookingDate = document.forms["jsForm"]["BookingDate"].value;
            

            if(username == "" || BookingDate == "") {
                document.getElementById('errorMsg').innerHTML = "Please fill up the VIP form properly";
                document.getElementById('errorMsg').style.color = "#8C001A";
            }
            else {
                isValid = true;
            }

            return isValid;
        }
    </script>
 

</body>
</head>
</html>

