<?php
session_start();
error_reporting(0);
include("Dbcon.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:Login.php?error=nologin');

if(isset($_POST["button"]))
{
    if (mysql_real_escape_string($_POST[newpass]) == $_POST[newpass])
    {
mysql_query("UPDATE customers SET AccPass='$_POST[newpass]' WHERE CustomerID='$_SESSION[customerid]' AND AccPass='$_POST[oldpass]'");
	if(mysql_affected_rows() == 1)
	{
	$ctrow = "Password updated successfully..";
	}
	else
	{
	$ctrow = "Failed to update Password";
	}
        }
    else
        $ctrow = "Invalid New Password";
}
?>
<html>
<head>
<link href="images/bank.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOSER'S BANKy</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />
<script language = "javascript">
function validateForm()
{
var x=document.forms["form1"]["loginid"].value;
var y=document.forms["form1"]["oldpass"].value;
var z=document.forms["form1"]["newpass"].value;
var a=document.forms["form1"]["confpass"].value;
if (x==null || x=="")
  {
  alert("Login id must be filled out");
  return false;
  }
  if (y==null || y=="")
  {
  alert("Old password must be entered");
  return false;
  }
  if (z==null || z=="")
  {
  alert("Enter the new password");
  return false;
  }
  if (a==null || a=="")
  {
  alert("Password must be confirmed");
  return false;
  }
  if(!(z==a))
      {
          alert("Password Mismatch");
          return false;
      }
}
</script>

</head>
<body>
    <img id="contain" src="images/bank1.png">
   
    <div id="bodycontent">

<div id="templatemo_wrapper">

    <div class="mainbox">

        <div id="site_title">
        
            <h1 style="margin-top: 30px;"><a href="index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>The Loser's Bank</span></a></h1>

            
        </div> <!-- end of site_title -->
    </div> <!-- end of header -->
<div  id="toptabmenu">
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
    <div id="sidecon">
        <h2>CHANGE LOGIN PASSWORD :</h2>

        	<form onsubmit="return validateForm()" id="form1" name="form1" method="post" action="">
                    <table width="606" height="314" border="0">
                        <tr>
                            <th colspan="2" scope="row">&nbsp;   <?php echo $ctrow; ?>	</th>
                        </tr>
        	    
                        <tr>
                            <th width="289" height="46" scope="row">Login ID</th>
                            <td width="210"><input name="loginid" type="text" id="loginid" size="35" readonly="readonly" value="<?php echo $_SESSION[customerid]; ?>"/></td>
                        </tr>
                        
                        <tr>
                            <th height="42" scope="row">Old Password :</th>
                            <td><input name="oldpass" type="password" id="oldpass" size="35" /></td>
                        </tr>
                        
                        <tr>
                            <th height="47" scope="row">New Password :</th>
                            <td><input name="newpass" type="password" id="newpass" size="35" /></td>
                        </tr>
                            
                        <tr>
                            <th height="46" scope="row">Confirm Password :</th>
                            <td><input name="confpass" type="password" id="confpass" size="35" /></td>
                        </tr>
        	    
                        <tr>
                            <th scope="row">&nbsp;</th> <td>&nbsp;</td>
                        </tr>
        	    
                        <tr>
                            <th height="60" scope="row">&nbsp;</th>
                            <td><input type="submit" name="button" id="button" value="UPDATE PASSWORD" /></td>
                        </tr>
                </table>
          </form>
    </div>
    
    <div id="sidebar">
        <h2>Personalise</h2>
                
                <ul>
             
                <li><a href="changetranspassword.php">Change Transaction Password</a></li>
       
                </ul>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>