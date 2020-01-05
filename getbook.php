
<?php

include_once "dbcon.php";
include_once "common.php";


$phonenumber = $_POST['phonenumber'];
$namet = $_POST['namet'];
$namet = preg_replace("/ /", "+", $namet);
$phone = $_POST['phone'];





$sql = "INSERT INTO phonebookdata (`phonenumber`, `name`, `hphone`) VALUES ('$phonenumber','$namet','$phone');";

run( $sql );

?>
