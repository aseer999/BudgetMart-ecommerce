<?php
include("plugins/connect.php");
session_start();
$user_id=$_SESSION['user_id'];


if(isset($_POST['add_ticket']))
{
	$subject = $_POST['subject'];
	$issue = $_POST['issue'];

	$sql = "INSERT into tickets(user_id, subject)
	values($user_id, '$subject')";
     $r = $conn->query($sql);
    if($r)
    	echo "tickets insert ok";
    else
    	echo "ticket error";
    $sql = "SELECT ticket_id from tickets ORDER BY ticket_id DESC LIMIT 0,1 ";
    $r = $conn->query($sql);
    if($r)
    	echo "ticket id get";
    else
    	echo "Ticket error";
    while ($row=$r->fetch_assoc()) {
    	$ticket_id = $row['ticket_id'];
    }

    $sql = "INSERT into msg(ticket_id, user_id, responses)
    values($ticket_id, $user_id, '$issue')";
    $r=$conn->query($sql);
    if($r)
       echo "Success";
   else
   	   echo "Error";
   $_SESSION['ticket_id']=$ticket_id;
    header("Location:support.php");
}
?>