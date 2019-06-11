<?php
include("plugins/connect.php");
session_start();
$user_id = $_SESSION['user_id'];
$ticket_id = $_SESSION['ticket_id'];
if(isset($_POST['rate']))
{
	$rateing =$_POST['rateing'];

	$sql ="UPDATE tickets set rating=$rateing, closed=1 where ticket_id=$ticket_id";
	$r = $conn->query($sql);
	if($r)
	echo "Success";
	else
	echo "Error"; 
header("Location: rateSuccess.php");
}
?>