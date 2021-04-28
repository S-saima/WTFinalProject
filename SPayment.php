<?php
session_start();
?>

<?php
$username = $PaymentType = $BedType = $DayType = "";
$usernameerr = $PaymentTypeerr = $BedTypeerr = $DayTypeerr = "";

 if($_SERVER['REQUEST_METHOD'] == "POST") {

 if(empty($_POST['username'])) {
$usernameerr = "Please Fill up the Username!";
}
else
{
$username=$_POST['username'];
}

if(empty($_POST['BedType'])) {
$BedTypeerr = "Please fill up the bed type!";
}

 else
{
$BedType=$_POST['BedType'];
}


 if(empty($_POST['DayType'])) {
$DayTypeerr = "Please fill up the total day!";
}

 else
{
$DayType=$_POST['DayType'];
}

 if(empty($_POST['PaymentType'])) {
$PaymentTypeerr = "Please fill up the payment type!";
}

 else
{
$PaymentType=$_POST['PaymentType'];
}

if($usernameerr ==""&&$BedTypeerr ==""&&$DayTypeerr==""&&$PaymentTypeerr==""){
 $username = $_POST['username'];
 $BedType=$_POST['BedType'];
 $DayType=$_POST['DayType'];
 $PaymentType=$_POST['PaymentType'];


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

        $stmt1 = mysqli_prepare($conn1, "insert into payment (UserName,BedType,TotalDay,PaymentType) values (?, ?, ?, ?)");
        mysqli_stmt_bind_param ($stmt1, "ssss", $a1, $a2, $a3, $a4);
        $a1 = $_POST['username'];
        $a2 = $_POST['BedType'];
        $a3 = $_POST['DayType'];
        $a4 = $_POST['PaymentType'];

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
<title>Payment</title>
<link rel="stylesheet" type="text/css" href="SPayment.css">

<body>
<div class="Payment">
<center>
    <h4 style="color: black; font-family: cooper black;"><b><?php echo "Welcome " . $_SESSION['username'] ?></b> </h4>
<h1>Payment Here</h1>
<form name="jsForm" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"><b>


<p>UserName:</p>
<label for="username"></label>
<input type="text" name="username" id="username" value="<?php echo $username ?>">
<h5>
<?php echo $usernameerr; ?>
	
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

    <select name="DayType">
    <option selected disabled="">Total Days:</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    </select>
    <h5>
<?php echo $DayTypeerr; ?><br>
</h5>
    <br>
    

    
<select name="PaymentType">
    <option selected disabled="" >Select Payment Type:</option>
    <option value="bKash">bKash</option>
    <option value="CreditCard">Credit Card</option>
    <option value="Cash">Cash</option>
   
    </select>
<h5>
<?php echo $PaymentTypeerr; ?><br>
</h5>

 </b>
 <br>
 <br>
<input type="submit" value="PROCEED">
<h3 style="font-family: cooper black"><p id="errorMsg"></p></h3>
 
</font>
</head>
</form>
</center>
</div>


    <script>
        function validate() {
            var isValid = false;
            var username = document.forms["jsForm"]["username"].value;
            var BedType = document.forms["jsForm"]["BedType"].value;
            var DayType = document.forms["jsForm"]["DayType"].value;
            var PaymentType = document.forms["jsForm"]["PaymentType"].value;

            if(username == "" || BedType == "" || DayType == "" || PaymentType == "") {
                document.getElementById('errorMsg').innerHTML = "Please fill up the Payment form properly";
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