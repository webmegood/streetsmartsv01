<?php require_once('../../../../../connections/db_info_streetsmarts.php');

header('Content-type: application/json');



//$testvariable = $_GET['testvariable'];
//$username = $_GET['username'];
$username = "testusername";

//$sql = "SELECT name, cost FROM trails WHERE id = '$testvariable'";
$sql = "SELECT * 
FROM trails
INNER JOIN games
ON trails.entry_page_name=games.trail_name
WHERE games.username = '$username'
ORDER BY games.status ASC, games.id ASC ";
//ORDER BY games.status, games.date DESC " *****IS CORRECT so change back to this ****;


$result = mysql_query($sql) or die ("Query error: " . mysql_error());

$records = array();

while($row = mysql_fetch_assoc($result)) {
	$records[] = $row;
}

mysql_close($con);

echo $_GET['jsoncallback'] . '(' . json_encode($records) . ');';

?>