<?php require_once('../../../../../connections/db_info_streetsmarts.php');

header('Content-type: application/json');



//$testvariable = $_GET['testvariable'];
//$username = $_GET['username'];
$username = "testusername";

//$sql = "SELECT name, cost FROM trails WHERE id = '$testvariable'";


//Get all trails aside from those already part of user's purchases
$sql = "SELECT * FROM trails LEFT JOIN games ON trails.entry_page_name = games.trail_name AND games.username = '$username' WHERE games.trail_name IS NULL ORDER BY trails.date_added ASC"; 




$result = mysql_query($sql) or die ("Query error: " . mysql_error());

$records = array();

while($row = mysql_fetch_assoc($result)) {
	$records[] = $row;
}

mysql_close($con);

echo $_GET['jsoncallback'] . '(' . json_encode($records) . ');';

?>