<?php
session_start();
error_reporting(0);
include("Dbcon.php");

if(isset($_SESSION['customerid']))
{
	header("Location: AccAlerts.php"); exit(0);
}
if(isset($_SESSION['adminid']))
{
    header("Location: admindashboard.php");
}

?>

<html>
<head>
<link rel="stylesheet" href="IndexImg.css">
<link href="images/bank.ico" rel="shortcut icon">
<title>NETBANKING</title>
</head>
<body>
    
<h1 align = center style="margin-top: 30px;"><a href="Index.php" style="color:blue; text-decoration: none; margin-left: 1em;"><span>WELCOME TO LOSER'S BANK</span></a></h1>
<p align=center color:green> Not A Member? Go & Register To Avail  All Kinds Of Facilities</p>
            
      
<div align=left id="toptabmenu">
	<ul id="nav">
		<li><a href="Login.php">Login</a></li>
		<li><a href="Register1.php">Register</a></li>
		<li><a href="Branches.php">Branches</a></li>
		<li><a href="Contact.php">Contact Us</a></li>
		<li><a href="welcome.php">Go Back To Welcome Page</a></li>
		</ul>
</div>
</div>
	<div id="templatemo_main">
         <div id="content-slider" class="b">
    	<div id="slider" style="float:left">
        	<div id="mask">
            <ul>
           	<li id="first" class="firstanimation">
            
            <img src="images/img_1.jpg"/>
            
            </li>

            
            
            
                        
            <li id="fifth" class="fifthanimation">
            <img src="images/img_5.png"/>
            </li>
            </ul>
            </div>
            </div>
		</div>
	</div>

            
                          
                 
</div></div>
     </div>
    <hr/><br/>
         <div class="home">
             <div class="begin"> <h2><a href="Register.php">Register For NetBanking Now!!</a></h2> <br/>Now monitor, transact and control your bank account online through our net banking service. 
             You can do multiple things from the comforts of your home or office with our Internet Banking - a one stop solution
             for all your banking needs.You can now get all your accounts details, submit requests and undertake a wide range of transactions online. Our E-Banking service 
             makes banking a lot more easy and effective.</div><br/><br/>
             <span id="feat" ><font size="4"><b><u>FEATURES</u></b></span><br/><br/>
             <ul style="padding-left:2em;list-style-image:url('images/next_blue.png');align:middle;"><li><span class="subhead"><b>Account Details : </b></span><br/><br/>View your bank account details, account balance, download statements and more. Also view your Demat, 
                     Loan & Credit Card Account Details too all in one place.</li><br/>
                 <li><span class="subhead"><b>Fund Transfer :</b></span><br/><br/>Transfer fund to your own accounts,Other Gotham Bank accounts seamlessly.</li><br/>
                 <li><span class="subhead"><b>Request Services :</b></span><br/><br/>Give a request for Cheque book,Demand Draft,Stop Cheque Payment,Debit Card Loyalty Point Redemption etc.</li><br/>
                 <li><span class="subhead"><b>Investment Services :</b></span><br/><br/>View your complete Portfolio with the bank, Create Fixed Deposit, Apply for IPO </li><br/>
                 <li><span class="subhead"><b>Value Added Services :</b></span><br/><br/>Pay Utility bills for more than 160 billers, Recharge Mobile, Create Virtual Cards, Pay any Visa Credit Card bills,
Register for estatement and sms banking</li></ul><br/>
<div class="begin"><i>Register now for Loser's Bank Internet Banking Service to get started and avail for you multiple utility services, all in a matter of a click. Getting started with our internet banking is real easy. 
All you need to do is follow a few simple steps and you are good to go. </i><a href="Register1.php">Click here</a> <i>for our registration process.</i>

         </div>
         </div>
    </div> <!-- end of main -->
    </div>
    <?php include'footer.php' ?>
</body>
</html>