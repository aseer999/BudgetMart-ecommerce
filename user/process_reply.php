<?php
include("plugins/connect.php");
session_start();
$ticket_id = $_SESSION['ticket_id'];
$user_id = $_SESSION['user_id'];
$reply = $_POST['message'];


	$sql = "UPDATE msg set notified=2 where ticket_id=$ticket_id and user_id=999";
    $r = $conn->query($sql);
    
    $sql = "insert into msg(ticket_id, user_id, responses) values($ticket_id, $user_id, '$reply')";
    $r = $conn->query($sql);
   
   


?>
