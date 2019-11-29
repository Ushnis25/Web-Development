<?php
session_start();
include("Dbcon.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:Login.php?error=nologin');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOSER'S BANK</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />
<link href="images/bank.ico" rel="shortcut icon">
</head>
<body>
    <img id="contain" src="images/bank1.png">

    <div id="bodycontent">

<div id="templatemo_wrapper">

    <div class="mainbox">
        <img src="images/image1.jpg" width="200" height="100" style="float:left; margin:2em 2em;">
        <div id="site_title">
        
            <h1 style="margin-top: 30px;"><a href="Index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>The Loser's Bank</span></a></h1>

            
        </div> <!-- end of site_title -->
    </div> <!-- end of header -->
<div id="toptabmenu">
    <ul>
            <li><a href="AccAlerts.php">My accounts</a></li>
            <li><a href="TransferFunds.php">Transfer funds</a></li>
            
            <li><a href="changetranspass.php">Personalise</a></li>
            <li><a href="Logout.php">logout</a></li>
    </ul>
    
</div>
</div>

<div id="templatemo_main">
    <div id="sidecon">
       <h2> Transactions made</h2>
        	  <table border="1">
        	    <tr>
        	      <td height="27"><strong>Transaction No.</strong></td>
                  <td><strong>Transaction Date</strong></td>
                  <td><strong>Payor ID</strong></td>
               
        	      <td><strong>Amount</strong></td>
            	  <td><strong>Status</strong></td>
      	      </tr>
<?php
$query="SELECT * FROM transactions where PayorID=".$_SESSION['customerid']."  ORDER BY  PaymentDate DESC";
$rectrans=mysql_query($query);
while($recs = mysql_fetch_array($rectrans))
{	
$transid=$recs['TransID'];
$transdate=$recs['PaymentDate'];
$payor=$_SESSION['customerid'];
	
    $amount=$recs['Amount'];
    $status=$recs['PaymentStat'];	
		echo "<tr>
        	      <td>$transid</td>
        	      <td>$transdate</td>
        	      <td>$payor</td>
        	     
                  <td>$amount</td>
        	      <td>$status</td></tr>";
	
}
?>
      	    </table>
        	  <p><input type="button" value="Print Transaction detail" onClick="window.print()"></p>
    </div>
    
    <div id="sidebar">
         <h2>Transfer Funds</h2>
                <ul>
              
                <li><a href="ViewRegPayee.php">View registered Payee</a></li>
                <li><a href="makepayments.php">Make a Payement</a></li>
                <li><a href="TransMade.php?pst=Complete">Payements Made</a></li>
                </ul>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>

