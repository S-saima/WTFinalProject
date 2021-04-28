<?php
session_start();
?>

<?php
$username = $BookingDate = $LeavingDate = $BedType ="";
$usernameerr = $BookingDateerr = $LeavingDateerr = $BedTypeerr ="";

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

if(empty($_POST['LeavingDate'])) {
$LeavingDateerr = "Please fill up the leaving time!";
}

 else
{
$LeavingDate=$_POST['LeavingDate'];
}

if(empty($_POST['BedType'])) {
$BedTypeerr = "Please fill up the bed type!";
}

 else
{
$BedType=$_POST['BedType'];
}

 

if($usernameerr ==""&&$BookingDateerr ==""&&$LeavingDateerr==""&&$BedTypeerr==""){
 $username = $_POST['username'];
 $BookingDate=$_POST['BookingDate'];
 $LeavingDate=$_POST['LeavingDate'];
 $BedType=$_POST['BedType'];


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

        $stmt1 = mysqli_prepare($conn1, "insert into bookingroom1 (UserName,BookingDate,LeavingDate,BedType) values (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt1, "ssss", $a1, $a2, $a3, $a4);
        $a1 = $_POST['username'];
        $a2 = $_POST['BookingDate'];
        $a3 = $_POST['LeavingDate'];
        $a4 = $_POST['BedType'];

        $res = mysqli_stmt_execute($stmt1);

        if($res) {
            echo "Data Inserted Successfully!";
        //$_SESSION['username'] = $Lastname;
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

//setcookie($username,$password,time()+60);

 //if(isset($_COOKIE[$username])){

//$_SESSION['user'] = $username;

}


?>

<!DOCTYPE html>
<html>
<head >
<title>Book Room</title>
<link rel="stylesheet" type="text/css" href="SBooking.css">

<body>

<div class="Booking">
<center>
<h2 style="color: black;"><b><?php echo "Welcome " . $_SESSION['username'] ?></b> </h2>
<h2 font-size: 22px;
font-family: cooper black;
color: #FFF5EE; text-shadow: 2px 1px 2px #8C001A;>Any Type Of Room Is Available For You</h2>
<form name="jsForm" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"><b>


<p>UserName:</p>
<label for="username"></label>
<input type="text" name="username" id="username" value="<?php echo $username ?>">
<h5>
<?php echo $usernameerr; ?></h5>
<br>

<p>Date of Booking:</p>
<label for="BookingDate"></label>
<input type="Date" id="BookingDate" name="BookingDate"
value="<?php echo $BookingDate ?>">
<h5>
<?php echo $BookingDateerr; ?><br><br>
</h5>
<p>Date of leaving:</p>
<label for="LeavingDate"></label>
<input type="Date" id="LeavingDate" name="LeavingDate"
value="<?php echo $LeavingDate ?>">
<h5>
<?php echo $LeavingDateerr; ?><br>
</h5>
<br>

<select name="BedType">
    <option selected disabled >Select Bed Type:</option>
    <option value="Single">Single</option>
    <option value="Double">Double</option>
    
   
    </select>
<h5>
<?php echo $BedTypeerr; ?><br>
</h5>
    <br>
<input type="submit" value="PROCEED">
<h2><p id="errorMsg"></p></h2>

 </div>
</font>
</head>
</form>
</center>

<script>
        function validate() {
            var isValid = false;
            var username = document.forms["jsForm"]["username"].value;
            var BookingDate = document.forms["jsForm"]["BookingDate"].value;
            var LeavingDate = document.forms["jsForm"]["LeavingDate"].value;
            var BedType = document.forms["jsForm"]["BedType"].value;
            

            if(username == "" || BookingDate == "" || LeavingDate == "" || BedType == "" ) {
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