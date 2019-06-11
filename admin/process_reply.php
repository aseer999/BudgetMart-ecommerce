<?php
include("../plugins/connect.php");
session_start();

	$reply = $_POST['message'];
    $ticket_id = $_SESSION['ticket_id'];

    $sql = "UPDATE msg set notified=2 where ticket_id=$ticket_id and user_id!=999";
    $r = $conn->query($sql);
    
    $sql = "insert into msg(ticket_id, user_id, responses) values($ticket_id, 999, '$reply')";
    $r = $conn->query($sql);
  


?>