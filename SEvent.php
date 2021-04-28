<?php
session_start();
?>

<?php
$username = $BookingDate = $EventType ="";
$usernameerr = $BookingDateerr = $EventTypeerr = "";

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

if(empty($_POST['EventType'])) {
$EventTypeerr = "Please fill up the event type!";
}

 else
{
$EventType=$_POST['EventType'];
}

if($usernameerr ==""&&$BookingDateerr ==""&&$EventTypeerr==""){
 $username = $_POST['username'];
 $BookingDate=$_POST['BookingDate'];
 $EventType=$_POST['EventType'];



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

        $stmt1 = mysqli_prepare($conn1, "insert into event (UserName,BookingDate,EventType) values (?, ?, ?)");
        mysqli_stmt_bind_param ($stmt1, "sss", $a1, $a2, $a3);
        $a1 = $_POST['username'];
        $a2 = $_POST['BookingDate'];
        $a3 = $_POST['EventType'];
        

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

}

?>

<!DOCTYPE html>
<html>
<head >
<title>Event</title>
<link rel="stylesheet" type="text/css" href="SEvent.css">

<body>
<div class="event">
<center>
	<h2 style="color: black;"><b><?php echo "Welcome " . $_SESSION['username'] ?></b> </h2>
<h2>Any Type Of Event Is Available For You</h2>
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

<select name="EventType">
    <option selected disabled>Select Event Type:</option>
    <option value="Weeding">Weeding</option>
    <option value="Birthday">Birthday</option>
    <option value="Meeting">Meeting</option>
   
    </select>
<h5>
<?php echo $EventTypeerr; ?><br>
</h5>


 </b>
 <br>
 <br>
<input type="submit" value="PROCEED">
<h2 style="font-family: cooper black"><p id="errorMsg"></p></h2>
 
</font>
</head>
</form>
</center>
</div>



    <script>
        function validate() {
            var isValid = false;
            var username = document.forms["jsForm"]["username"].value;
            var BookingDate = document.forms["jsForm"]["BookingDate"].value;
            var EventType = document.forms["jsForm"]["EventType"].value;

            if(username == "" || BookingDate == "" || EventType == "") {
                document.getElementById('errorMsg').innerHTML = "Please fill up the event form properly";
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