<?php
error_reporting();
$con=mysql_connect("localhost","root","") or die("Could not Connect My Sql");
mysql_select_db("bank1",$con)  or die("Could not connect to Database");


?>
