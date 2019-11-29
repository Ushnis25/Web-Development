<?php
session_start();
error_reporting(0);
include("Dbcon.php");

if(isset($_POST['pay']))
{
$payto = $_POST['pay_to'];
$payamt = $_POST['pay_amt'];
$payacno= $_POST['ac_no'];
$result1 = mysql_query("select * from registered_payee WHERE SlNo='$payto'");
if(mysql_num_rows($result1) == 1)
{
	$arrpayment = mysql_fetch_array($result1); 
	$payeetype='ext';
}
else
{
    $result1= mysql_query("SELECT * FROM customers WHERE CustomerID='$_POST[pay_to]'");
    $arrpayment1 = mysql_fetch_array($result1);
    $payeetype='int';
    $arrpayment['PayeeName'] = $arrpayment1['FirstName']." ".$arrpayment1['LastName'];
    $arrpayment['BankName'] = "The Loser's Bank";
    $res1=mysql_query("SELECT * FROM accounts WHERE CustomerID='$_POST[pay_to]'");
    $arrpayment4 = mysql_fetch_array($res1);
    $arrpayment['AccType'] = $arrpayment4['AccType'];
    $arrpayment['AccNo'] = $arrpayment4['AccNo'];
  
}
}
$dt = date("Y-m-d h:i:s");
$custid=  mysql_real_escape_string($_SESSION['customerid']);
$resultpass = mysql_query("select * from customers WHERE CustomerID='$custid'");
$arrpayment1 = mysql_fetch_array($resultpass);

if(isset($_POST["pay_to"]))
{
        if (!($_POST['trpass'] == $_POST['conftrpass']))
        {
            $passerr = "Password Mismatch";
            header('Location:makepayments.php?error=passwordmismatch');
            exit(0);
        }
	else if($_POST['trpass'] == $arrpayment1['transpassword'])
	{
            $rr = mysql_query("SELECT * FROM accounts WHERE CustomerID ='".$_SESSION['customerid']."'");
            $rrarr=  mysql_fetch_array($rr);
		$amount=$_POST['pay_amt'];
                if ($amount>$rrarr['AccBalance'])
                {
                    header('Location:makepayments.php?error=insufficientbalance');
                    exit(0);
                }
                
                if (isset($_POST['payeetype']))
                {
                    
                    if ($_POST['payeetype'] == 'int')
                    {     mysql_query("UPDATE accounts SET AccBalance = AccBalance+$amount WHERE CustomerID ='".$_POST['payto']."'") or die(mysql_error ());
                    }
                }
                $sql="INSERT INTO transactions (PaymentDate,PayorID,PayeeID,Amount,PaymentStat) VALUES ('$dt','".$_SESSION['customerid']."','".$_POST['payto']."','$amount','active')";
                mysql_query($sql) or die("Unable to insert into transactions");
                mysql_query("UPDATE accounts SET AccBalance = AccBalance-$amount WHERE CustomerID ='".$_SESSION['customerid']."'");
		
				if (!mysql_query($sql))
				  {
				  die('Error: ' . mysql_error());
				  }
				if(mysql_affected_rows() == 1)
				  {
					$successresult = "Transaction successfull";
					header("Location: makepayments3.php");
				  }
				else
				  {
					  $successresult = "Failed to transfer";
				  }
	}
	else
	{
		$passerr = "Invalid password entered!!!<br/> Transaction Failed </br>";
        header('Location:makepayments.php?error='.$passerr);
        exit(0);
	}		  
}

$custid=  mysql_real_escape_string($_SESSION['customerid']);
$acc= mysql_query("select * from accounts where CustomerID='$custid'");

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
        <img src="images/netbanking1.jpg" width="200" height="100" style="float:left; margin:2em 2em;">
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
        <form id="form1" name="form1" method="post" action="makepayments3.php">
  

      
     	<h2>&nbsp;Make payment to <?php if(isset($arrpayment['PayeeName'])) echo $arrpayment['PayeeName']; ?></h2>
              <table width="564" height="220" border="1">
                <?php
				if(isset($passerr))
				{
					?>
                <tr>
                  <td colspan="2">&nbsp;<?php echo $passerr; ?></td>
                </tr>
                <?php
				}
				?>
                <tr>
                  <td width="203"><strong>Pay to</strong></td>
                  <td width="322">
				  <?php
				echo "<b>&nbsp;Payee Name : </b>".$arrpayment['PayeeName'];
				echo "<br><b>&nbsp;Account No. : </b>".$arrpayment['AccNo'];
				echo "<br><b>&nbsp;Account type : </b>".$arrpayment['AccType'];
				echo "<br><b>&nbsp;Bank name : </b>".$arrpayment['BankName'];
				echo "<br><b>&nbsp;IFSC Code : </b>".$arrpayment['IFSCCode'];
	
                  ?>
                  
<input type="hidden" name="payto" value="<?php echo $payto; ?>"  />
<input type="hidden" name="payamt" value="<?php echo $payamt; ?>"  />
<input type="hidden" name="payeeid" value="<?php echo $payacno; ?>"  />
<input type="hidden" name="payeetype" value="<?php echo $payeetype; ?>"  />
				  </td>
                </tr>
                <tr>
                  <td><strong>Payment amount</strong></td>
                  <td>&nbsp;<?php echo number_format($payamt,2); ?></td>
                </tr>
                <tr>
                  <td><strong>Account number</strong></td>
                  <td>&nbsp;<?php echo $payacno; ?></td>
                </tr>
                <tr>
                  <td><strong>Enter Transaction Password</strong></td>
                  <td><input name="trpass" type="password" id="trpass" size="35" /></td>
                </tr>
                <tr>
                  <td><strong>Confirm Password</strong></td>
                  <td><input name="conftrpass" type="password" id="conftrpass" size="35" /></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="right">
                    <input type="submit" name="pay2" id="pay2" value="Pay" />
                    <input name="button" type="button" onclick="<?php echo "window.location.href='AccAlerts.php'"; ?>" value="Cancel" alt="Pay Now" />
                  </div></td>
                </tr>
              </table>
       	  </form>
    </div>
    
    <div id="sidebar">
         <h2>Transfer Funds</h2>
                
                <ul>
                <li><a href="addexternalpayee.php">Add External Payee</a></li>
                <li><a href="viewexternalpayee.php">View registered Payee</a></li>
                <li><a href="Makepayment.php">Make a Payement</a></li>
                <li><a href="TransMade.php?pst=Complete">Payments Made</a></li>
                </ul>
    </div>
</div><


<?php include'footer.php' ?>
    </div>
</body>
</html>
