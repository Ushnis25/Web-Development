<?php
require "Dbcon.php";
       $uname=$_REQUEST["Uname"];
       $password=$_REQUEST["password"];
       
      
       $query1="SELECT * FROM customers WHERE  LoginID= '$uname' AND AccPass= '$password'";
       $query2="SELECT * FROM users WHERE  LoginID= '$uname' AND Pass= '$password'";
       $qresult1=mysql_query($query1);
       $num_rows1 = mysql_num_rows($qresult1);
       $qresult2=mysql_query($query2);
       $num_rows2 = mysql_num_rows($qresult2);
       
       if (($num_rows1==0)&&($num_rows2==0))
       {header ('Location:Index.php?error=1');}
       else if (($num_rows1==1)&&($num_rows2==0))
	   { header ('Location:Index.php?error=3');}
       else
       {   $arr=mysql_fetch_array($qresult1);
           $fname=$arr['Fname'];
           $uname=$arr['Uname'];
           session_start();
           $_SESSION['fname']=$fname;
           $_SESSION['user']=$uname;
           session_write_close();
           header('Location:AccAlerts.php');
       }
       ?>