<?php
session_start();
include("Dbcon.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:Login.php?error=nologin');
$regdarray = mysql_query("SELECT * from registered_payee");
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
        
            <h1 style="margin-top: 30px;"><a href="index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>The Loser's Bank</span></a></h1>
            
        </div> <!-- end of site_title -->
    </div> <!-- end of header -->
<div id="toptabmenu">
    <ul>
            <li><a href="AccAlerts.php">My accounts</a></li>
            <li><a href="TransferFunds.php">Transfer funds</a></li>
            <li><a href="payloans.php">Pay loans</a></li>
            <li><a href="mailinbox.php">Mails</a></li>
            <li><a href="changetranspassword.php">Personalise</a></li>
            <li><a href="Logout.php">logout</a></li>
    </ul>
    
</div>
</div>

<div id="templatemo_main">
    <div id="sidecon" style="width:895px;">
        <h2>External Payee</h2>
       <table width="890" border="1">
      <tr>	
        <th width="80" scope="col">SL NO</th>
        <th width="93" scope="col">PAYEE NAME</th>
        <th width="101" scope="col">ACCOUNT NUMBER</th>
        <th width="144" scope="col">ACCOUNT TYPE</th>
        <th width="180" scope="col">BANK NAME</th>
        <th width="132" scope="col"><p>IFSC CODE</p></th>
      </tr>
      <?php	
 while($regd = mysql_fetch_array($regdarray))
	  {
echo "
      <tr>
        <td>&nbsp;$regd[SlNo]</td>
        <td>&nbsp;$regd[PayeeName]</td>
        <td>&nbsp;$regd[AccNo]</td>
        <td>&nbsp;$regd[AccType]</td>
        <td>&nbsp;$regd[BankName]</td>
        <td>&nbsp;$regd[IFSCCode]</td>
        
      </tr>";
	  }
	  ?>
    </table>
    </div>
    
    
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
