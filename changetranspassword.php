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
mysql_query("UPDATE customers SET TransPass='$_POST[newpass]' WHERE CustomerID = '$_SESSION[customerid]' AND TransPass='$_POST[oldpass]'") or mysql_error();
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOSER'S BANK</title>
<link href="images/bank.ico" rel="shortcut icon">
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
  alert("Old password must be filled out");
  return false;
  }
  if (z==null || z=="")
  {
  alert("New password must be filled out");
  return false;
  }
   if (a==null || a=="")
  {
  alert("Password must be confirmed");
  return false;
  }
  if (!(z == a))
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
        
            <h1 style="margin-top: 30px;"><a href="Index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>The Loser's Bank</span></a></h1>
            
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
        <h2>CHANGE TRANSACTION PASSWORD</h2>

        	<form id="form1" name="form1" method="post" action=""onsubmit="return validateForm()">
     
        	  <table width="459" height="239" border="0">
        	    <tr>
        	      <th colspan="2" scope="row">&nbsp;
			<?php echo $ctrow;?>				  
                      </th>
                    </tr>
        	    <tr>
        	      <th scope="row">LoginID :              </th>
        	      <td><input name="loginid" type="text" id="loginid" size="35" readonly="readonly" value="<?php echo $_SESSION["customerid"]; ?>"/></td>
      	      </tr>
        	    <tr>
        	      <th scope="row">Old Password :</th>
        	      <td><input name="oldpass" type="password" id="oldpass" size="35" /></td>
      	      </tr>
        	    <tr>
        	      <th scope="row">New Password :         </th>
        	      <td><input name="newpass" type="password" id="newpass" size="35" /></td>
      	      </tr>
        	    <tr>
        	      <th scope="row">Confrim Password :</th>
        	      <td><input name="confpass" type="password" id="confpass" size="35" /></td>
      	      </tr>
        	    <tr>
        	      <th scope="row">&nbsp;</th>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <th scope="row">&nbsp;</th>
        	      <td><input type="submit" name="button" id="button" value="UPDATE PASSWORD" /></td>
      	      </tr>
      	    </table>
                    </form>
    </div>
    
    <div id="sidebar">
        <h2>Personalise</h2>
                
                <ul>
                <li><a href="changelogpassword.php">Change Login Password</a></li>
                
      
                </ul>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
