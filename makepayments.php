<?php
session_start();
error_reporting(0);

include("Dbcon.php");
if(!(isset($_SESSION['customerid'])))
    header('Location:Login.php?error=nologin');


$acc= mysql_query("select * from accounts where CustomerID='".$_SESSION['customerid']."'");
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
        <img src="images/image1.jpg" width="200" height="100" style="float:left; margin:2em 2em;">
        <div id="site_title">
        
            <h1 style="margin-top: 30px;"><a href="Index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>The Loser's Bank</span></a></h1>
            
            
        </div> <!-- end of site_title -->
    </div> <!-- end of header -->
<div id="toptabmenu">
    <ul>
            <li><a href="AccAlerts.php">My accounts</a></li>
            <li><a href="TransferFunds.php">Transfer funds</a></li>
            <li><a href="payloans.php">Pay loans</a></li>
            <li><a href="mailinbox.php">Mails</a></li>
            <li><a href="changetranspass.php">Personalise</a></li>
            <li><a href="Logout.php">logout</a></li>
    </ul>
    
</div>
</div>

<div id="templatemo_main">
    <div id="sidecon">
        <form id="form1" name="form1" method="post" action="makepayments2.php">
            <?php if(isset($_REQUEST['error']))
                 {      if($_REQUEST['error']=='nodetails')
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">Deatils Missing or Invalid.<br/>Payment Failed</h3>";
                        else if ($_REQUEST['error']=='passwordmismatch')
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">Password Mismatch<br/>Payment Failed</h3>";
                        else if ($_REQUEST['error'] == 'insufficientbalance')
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">Insufficient Balance<br/>Payment Failed</h3>";
                        else
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">".$_REQUEST['error']."</h3>";
                 }
                            ?>
  
     	<h2>Make Payment</h2>
           	  <table width="591" height="177" border="1">
        	    <tr>
        	      <td><strong>Pay to</strong></td>
        	      <td><label>
        	        <select name="pay_to" id="pay_to">
        	        <?php   $result=  mysql_query("SELECT * FROM registered_payee");
					  while($arrvar = mysql_fetch_array($result))
			  {
				echo "<option value='".$arrvar['SlNo']."'>".$arrvar['PayeeName']."</option>";
			  }  
                         
			  ?>
                           
      	            </select>
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td><strong>Payment Amount</strong></td>
        	      <td>
        	        <input type="number" min="100" name="pay_amt" id="pay_amt"/>
					
                      </td>
      	      </tr>
        	    <tr>
        	      <td><strong>Select A/C No.</strong></td>
        	      <td><label>
        	        <select name="ac_no" id="ac_no">
        	 			<?php  $acc=mysql_query("SELECT*FROM registered_payee");
						while($rowsacc = mysql_fetch_array($acc))
						{
							echo "<option value='".$rowsacc['AccNo']."'>".$rowsacc['AccNo']."</option>";
						}
						?>
      	            </select>
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="Pay" />
        	      </div></td>
       	        </tr>
      	    </table><p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p>        	  
       	  </form>
    </div>
    
    <div id="sidebar">
        <h2>Transfer Funds</h2>
                
                <ul>
                <li><a href="addextpayee.php">Add External Payee</a></li>
                <li><a href="viewextpayee.php">View registered Payee</a></li>
                <li><a href="makepayments.php">Make a Payement</a></li>
                <li><a href="TransMade.php?pst=Complete">Payements Made</a></li>
                </ul>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
