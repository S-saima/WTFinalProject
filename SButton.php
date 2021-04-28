<?php
 session_start();
?>
<!DOCTYPE html>
<htm>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="Sstyle.css">
</head>
<body>
	

    <div class="navbar">
    <ul>
        
        <li class="dropdown"> <a href="">Your Booking</a>
             
             <ul>
             	<li><a href="ContactUs.html">Contact Us</a></li>
             	<li><a href="BookDetails.html">Booking Details</a></li>
                <li><a href="CancelBook.php">Cancel Booking</a></li>
                 
             </ul>
             
         
        
        </li>
        
    </ul>

    </div>
    
<header>
	<div class="session">
		<?php
            echo "<center>Welcome ". $_SESSION['username'];
		?>
	</div>
	<div class="container">
		
		
		<button onclick="window.location.href='SBooking.php'" class="btn btn1">Booking Room</button>
		<button onclick="window.location.href='SFood.php'" class="btn btn2">Food Menu</button>
		<button onclick="window.location.href='SPayment.php'" class="btn btn3">Payment Method</button>
		<button onclick="window.location.href='SEvent.php'" class="btn btn4">Event</button>
		<button onclick="window.location.href='SFacility.php'" class="btn btn5">Facilities</button>
		<button onclick="window.location.href='VipReq.php'" class="btn btn6">Special Request</button>
		<button onclick="window.location.href='ajaxrating.html'" class="btn btn7">Complain/Feedback</button>
		<button onclick="window.location.href='PassChange.php'" class="btn btn8">Change Password</button>
		<button onclick="window.location.href='Slogout.php'" class="btn btn9">Log Out</button>
		
	</div>
</header>
 <div id="footer">
 <p></p>
 <br>
 Designed By "Saima"
 </div>
</body>
</html>