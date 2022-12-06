<?php
header('Content-type: application/json');
include("conn.inc");
$mysql -> set_charset("utf8");
$sql = "SELECT * FROM ".$_GET["table"];
$result = $mysql->query( $sql) or die("Error in Selecting " . mysqli_error($mysql));
$temparray = array();
    while($row =mysqli_fetch_assoc($result)){
        $temparray[] = $row;
    }
echo '{ "'.$_GET["table"].'":'.json_encode($temparray)."}";
$mysql->close();
?>