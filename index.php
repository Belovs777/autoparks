<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
include_once("../inc/conn.inc");
$sql="";
$outp =array();//json datu iegusanai
$repo = new stdClass();//pazinojumu izvadisanai
//echo"ok<br>";
if(isset($_GET["q"]) ){
	include_once("../inc/".trim($_GET["q"]).".inc");
	//echo $sql."\n";
	$stmt = $mysql->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	$outp = $result->fetch_all(MYSQLI_ASSOC);
	echo '{ "records":'.json_encode($outp)."}";
}
if(isset($_GET["i"]) ){
	include_once("../inc/".trim($_GET["i"]).".inc");
		//echo $sql;
		$stmt = $mysql->prepare($sql);
		if ($stmt->execute()){
			$repo->alert="Dati saglabāti!";
		}else{
			$repo->alert="Dati netika saglabāti!".$sql;
		}
		$outp=$repo;
	}

?>
