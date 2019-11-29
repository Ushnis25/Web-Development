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
    header("Location: Admin.php");
}
if (isset($_SESSION['employeeid']))
{
    header("Location:EmpAcc.php");
}
?>
<html>
<head>
<link href="images/bank.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOSER'S BANK</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <img id="contain" src="images/bank1.png">

    <div id="bodycontent">

<div id="templatemo_wrapper">

    <div class="mainbox">
        <img src="images/netbanking1.jpg" width="200" height="100" style="float:left; margin:2em 2em;">
        <div id="site_title">
        
            <h1 style="margin-top: 30px;"><a href="index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>The Loser's Bank</span></a></h1>
            
            
        </div> <!-- end of site_title -->
    </div> <!-- end of header -->

<div id="toptabmenu">
    <ul id="nav">
        <li><a href="Index.php">Home</a></li>
        <li><a href="Login.php">Login</a></li>
        <li><a href="Branches.php">Branches</a></li>
        <li><a href="help.php">Help & FAQ</a></li>
        <li><a href="">Downloads</a>
            <ul>
                <li><a href="downloads/New_Account.pdf">New Account form</a></li>
                 <li><a href="">Loan Forms</a>
                 <ul>
                <li><a href="downloads/home_loan_application_form.pdf">Home Loan</a></li>
                 <li><a href="downloads/Car_Loan_Application_Form.pdf">Car Loan</a></li>
                  <li><a href="downloads/Education_Loan_Application_Form.pdf">Educational Loan</a></li>
            </ul>
                 </li>
                  <li><a href="downloads/ChequeBook_Request.pdf">Cheque book request</a></li>
            </ul>
        </li>
        <li><a href="Contact.php">Contact Us</a></li>
    </ul>
    
</div>
</div>
     <div id="templatemo_main"><span class="main_top"></span> 
         <div id="rightpanel"> <span class="rightpaneltext"> Head Office : 

<p>THE LOSER'S BANK <br/>
STAR HOUSE<br/> 
Peter Street,<br/> 

New York City<br/>
USA</br>
Ph: 022-66684444 <br/>
Email: banklosers@gmail.com
</P>
<p>
For all your enquiries :
Call at Tele No - (022) – 40919191 / 1800 220 229 (all days)
24 X 7</p></span></div> 
 <div id="leftpanel"><img src="images/note.png" width="220" height="200"/>
        <span class="leftpaneltext">Contact us...</span></div>
         <div id="rightpanel"></div>
    </div> 
    </div>
    <?php include'footer.php' ?>
    </body>
</html>
