<?php
include("inc/header.php");
if(isset($_SESSION['ticket_id']))
$ticket_id=$_SESSION['ticket_id'];
if(isset($_GET['ticket_id']))
{
	$_SESSION['ticket_id']=$_GET['ticket_id'];
	$ticket_id = $_GET['ticket_id'];
	$sql = "Update msg set notified=1 WHERE ticket_id=$ticket_id and user_id != 999 and notified!=2";
	$r = $conn->query($sql);

}

?>


<div class="section">
<?php
   $sql = "SELECT * FROM msg WHERE ticket_id=$ticket_id";
   $r = $conn->query($sql);

?>

<form method="post">
	

 <div class="support-chat">
 	<h1>Ticket - #<?php echo $ticket_id; ?></h1>
 	<div class="chat-view" id="chat_view"></div>


      <input id="message" type="text" name="message" placeholder="Type your message . . .">
      <input style="float: right;width: 155px;height: 49px;border-radius: 23px;background-color: #447db4;font-size: 20px;color: white;" id="btn_reply" type="button" value="Send">
 </div>
	 </form>
</div>

<?php
include("inc/footer.php");
?> 