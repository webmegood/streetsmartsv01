<?php

$server = "localhost";
$username = "mediathr_peterc";
$password = "DustyMartin04";
$database = "mediathr_streetsmarts_melbourne";

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
mysql_select_db($database, $con);

?> 