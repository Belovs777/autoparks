<?php
    if(isset($_POST['submit'])){
    if(!empty($_POST['marka'])) {
   
        $selected = $_POST['marka'];
        if(isset($_POST['submit'])){
    if(!empty($_POST['modelis'])) {
   
        $selecteds= $_POST['modelis'];
       
        echo 'You have chosen: ' . $selected .' and ' .$selecteds ;
    } else {
        echo 'Please select the value.';
    }
    }
    } 
    
    }
    
    
include "../inc/conn.inc";
// mysql select query
include "../inc/producer.inc";
$result = $mysql->query($sql);
// for method 1
$result1 = mysqli_query($mysql, $sql);

include "../inc/producer_seek.inc";
$marka = $mysql->query($sql);

$mark = $marka -> fetch_assoc();
if(count($mark)==0){
    echo "Šāda automobiļa nav";
}else{
include "../inc/model_seek.inc";    
    $modelis = $mysql->query($sql);
    $model = $modelis -> fetch_assoc();
if(count($model)==0){
    echo "Šāda automobiļa nav";}}
    setcookie('mark', $mark['name'], time() + 3600, "/");
    
// for method 2

$sql= "SELECT * FROM `car_model`";

// for method 1

$result2 = mysqli_query($mysql, $sql);


$mysql->close; 
//header('Location: ../galvena lapa/in.php')
?>

