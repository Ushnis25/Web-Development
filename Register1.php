<?php
session_start();
error_reporting(0);
$error=$_REQUEST['error'];
include("Dbcon.php");
if(isset($_SESSION['customerid']))
{
	header("Location: AccAlerts.php"); exit(0);
}
if(isset($_SESSION['adminid']))
{
    header("Location: Admin.php");
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOSER'S BANK</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />

</head>
<body>
    
<h1 align="center" style="color:blue"><font size=20>REGISTRATION PAGE</font></h2>
<h2 align="center">Fill Up The Following Form</h4>

<div id="toptabmenu">
    <ul id="nav">
        <li><a href="Index.php">Home</a></li>
        <li><a href="Login.php">Login</a></li>
        <li><a href="Branches.php">Branches</a></li>
        
        
        <li><a href="Contactus.php">Contact Us</a></li>
    </ul>
    
</div>
</div>

 <?php
         if($error==1)
            { ?> <div class="mainbox" style="width:550px;"><h1 style="font-size: 30px;">Data Missing or Invalid</h1><br/>
                  <ul style="color:#0FF; font-family:'The Girl Next Door',cursive; font-size: 20px; line-height: 20px; padding-left: 3em;">
                      <?php if($_REQUEST['fnameset']==1)
                            {
                                echo"<li>First Name cannot start with space or left blank</li>";
                            }
                            if($_REQUEST['lnameset']==1)
                            {
                                echo"<li>Last Name cannot start with space or left blank</li>";
                            }
                            if($_REQUEST['emailset']==1)
                            {
                                echo"<li>IFSC CODE should be valid and it needs to be verified</li>";
                            }
                            if($_REQUEST['pwdset']==1)
                            {
                                echo"<li>Password cannot be left blank & cannot contain special characters</li>";
                            }
                            if($_REQUEST['unameset']==1)
                            {
                                echo"<li>Login ID cannot be blank or special character</li>";
                            } ?>
			</ul></div> <?php }
        if($error==2)
                echo"<div class=\"mainbox\" style=\"width:450px;\"><h1 style=\"font-size: 30px;\">Password Mismatch</h1></div>";
        if($error==3)
                echo"<div class=\"mainbox\" style=\"width:450px;\"><h1 style=\"font-size: 30px;\">Login Id / Account No. Already Exists</h1></div>";
       if($error==4)
                echo"<div class=\"mainbox\" style=\"width:450px;\"><h1 style=\"font-size: 30px;\">Cannot verify this Email-Id</h1></div>";
        ?>
        
        <?php if($_REQUEST['success']==1) { ?> <div class="logmainbox" style="width: 480px;"><h1>Registered Successfully</h1></div> <?php } ?>
                    
					
<table align = "middle" class="logmainbox" style="width: 480px;">
        <form action="RegDb1.php" method="POST" align="center">
            <h1>Sign Up Form</h1>
            <div class="inset">
                <table>
                    <tr>
                        <td><label for="Fname" class="Ltext">First Name</label></td>
                        <td>
                            <input type="text" name="Fname" id="Fname" class="loginput"<?php if (($_REQUEST["fnameset"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Fname"]."\""; ?> >
                                       
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Lname" class="Ltext">Last Name</label></td>
                        <td><input type="text" name="Lname" id="Lname" class="loginput"<?php if (($_REQUEST["lnameset"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Lname"]."\""; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td><label class="Ltext">Gender</label></td> 
                        <td> <div style="display:inline;color:#666;padding: 0px; margin: 0px;"><input type="radio" name="Gender" value="M"<?php if(!$_REQUEST["Gender"]) { echo"checked=\"checked\""; } if($_REQUEST['Gender']=='M') { echo"checked=\"checked\""; } ?> >Male&nbsp;&nbsp;&nbsp;</div>
                             <div style="display:inline;color:#666;padding: 0px; margin: 0px;"><input type="radio" name="Gender" value="F"<?php if($_REQUEST["Gender"]=='F') { echo"checked=\"checked\""; } ?> >Female&nbsp;&nbsp;&nbsp;</div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="Ltext">Location</label></td>
                        <td>
                            <select name="City" class="ddlist">
                                <?php $city = array("Kolkata","London","Pune");
                                for ($i=0;$i<3;$i++)
                                {   echo"<option value=\"".$city[$i]."\""; if($_REQUEST["City"]==$i) {echo" selected=\"selected\"";} echo">".$city[$i]."</option>"; } ?>
                            </select>
                            <select name="State" class="ddlist">
                                <?php  $state = array("WestBengal","EdgBaston","Maharashtra");
                                        for($i=0;$i<3;$i++)
                                        {echo"<option value=\"".$state[$i]."\""; if ($_REQUEST["State"]==$i) {echo" selected=\"selected\"";} echo">".$state[$i]."</option>";} ?>
                            </select>
                            <select name="Country" class="ddlist">
                                <?php $country = array("India","England",);
                                for($i=0;$i<2;$i++)
                                {echo"<option value=\"".$country[$i]."\""; if($_REQUEST["Country"]==$i) {echo" selected=\"selected\"";} echo">".$country[$i]."</option>"; } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Email" class="Ltext">IFSC CODE</label></td>
                        <td><select name="Email" id="Email" class="ddlist">
						<?php 
						  $email=array("KOWB2345","LOENG8990","PUMR5676");
                           for($i=0;$i<3;$i++)
                           {
                            echo"<option value=\"".$email[$i]."\""; if($_REQUEST["Email"]==$i) {echo" selected=\"selected\"";} echo">".$email[$i]."</option>";    
                           }
						?>
                    
                </select></td>
                    </tr>
                    <tr>
                        <td><label for="Mnum" class="Ltext">Account Number</label></td>
                        <td><input type="text" name="Mnum" id="Mnum" class="loginput"<?php if (($_REQUEST["mnumset"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Mnum"]."\""; ?> ></td>
                    </tr>
                    <tr>
                        <td><label for="accstatus" class="Ltext">Account Status</label></td>
                        <td><select name="accstatus" id="accstatus" class="ddlist">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
					<?php $accstatus=array("Active","Inactive");
					for($i=0;$i<2;$i++)
					{
					echo"<option value=\"".$accstatus[$i]."\""; if($_REQUEST["accstatus"]==$i) {echo" selected=\"selected\"";} echo">".$accstatus[$i]."</option>"; 
					}
					?>
					
                </select>
				</td>
                    </tr>
                    <tr>
                        <td><label for="acctype" class="LText">Account Type</label></td>
                        <td><select name="acctype" id="acctype" class="ddlist">
						<option value="Current">Current</option>
                        <option value="Savings">Savings</option>
					
                        <?php $acctype=array("Current","Savings");
						
                           for($i=0;$i<2;$i++)
                           {
                                echo "<option value=\"".$acctype[$i]."\"";if($_REQUEST["acctype"]==$i){echo"selected=\"selected\"";}echo">".$acctype[$i]."</option>";
                           }?>
                    
                </select></td>
                    </tr>
                    <tr>
                        <td><label for="Uname" class="Ltext">Login ID</label></td>
                        <td><input type="text" name="Uname" class="loginput" id="Uname"<?php if (($_REQUEST["unameset"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Uname"]."\""; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Password" class="Ltext">Password</label></td>
                        <td><input type="password" name="Pwd" id="Password" class="loginput"<?php if ((($_REQUEST["pwdset"]==1))||($error==2)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\""; 
                                         else echo " value=\"".$_REQUEST["Pwd"]."\""; ?> >
						</td>
                    </tr>
                    <tr>
                        <td><label for="Cpassword" class="Ltext">Confirm Password</label></td>
                        <td><input type="password" name="Cpwd" id="Cpassword" class="loginput"<?php if ($error==2) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\""; 
                                         else echo " value=\"".$_REQUEST["Cpwd"]."\""; ?> >
					</tr>
                    <tr>
                        <td><label for="TrPassword" class="Ltext">Transaction Password</label></td>
                        <td><input type="password" name="TrPwd" id="TrPassword" class="loginput"<?php if ((($_REQUEST["pwdset"]==1))||($error==2)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                         else echo " value=\"".$_REQUEST["TrPwd"]."\""; ?> >
						</td>
                    </tr>
                    <tr>
                        <td><label for="TrCpassword" class="Ltext">Confirm Transaction Password</label></td>
                        <td><input type="password" name="TrCpwd" id="TrCpassword" class="loginput"<?php if ($error==2) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\""; 
                                         else echo " value=\"".$_REQUEST["TrCpwd"]."\""; ?> >
						</td>
					</tr>
                </table>
            </div>
                    <input type="submit" name="button" value="Register" style="margin-bottom:25px;margin-right: 25px;" class="loginput" align="middle">
        </form>
    </div>
</table>

</body>
</html>