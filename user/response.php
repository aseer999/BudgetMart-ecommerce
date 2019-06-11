<?php
include("inc/header.php");
if(isset($_SESSION['ticket_id']))
$ticket_id=$_SESSION['ticket_id'];
if (isset($_GET['ticket_id'])) {
  $ticket_id = $_GET['ticket_id'];
  $_SESSION['ticket_id']=$ticket_id;
  $sql = "UPDATE msg set notified=1 where ticket_id=$ticket_id And user_id=999";
  $r = $conn->query($sql);
}


?>


<!-- Section Portion -------------->

  <div class="main-section">
      <h2 style="text-align: center;">Support</h2>
  <form method="post" id="customer_reply" action="process_reply.php">
  

 <div class="support-chat" >
  <h1>Ticket - #<?php echo $ticket_id; ?></h1>

  
  <div class="chat-view" id="chat_view"></div>

<?php
   $sql="SELECT closed from tickets where ticket_id=$ticket_id";
   $r = $conn->query($sql);
   while ($row=$r->fetch_assoc()) {
     $t_closed=$row['closed'];
   }
?>


      <input id="message" type="text" name="message" placeholder="Type your message . . ."
   <?php
    if($t_closed==1)
     echo "disabled";
   ?>
    >

      <input
      style="float: right;width: 155px;height: 49px;border-radius: 23px;background-color: #447db4;font-size: 20px;color: white;" id="btn_reply" type="button" value="Send" 
      <?php
    if($t_closed==1)
     echo "disabled";
   ?>
      >
    </form>

 </div>
   









   <div class="tickets" id="tickets">
        
       </div>



<?php

   if($t_closed!=1)
   {
?>


       <form method="post" action="process_rate.php">
         <div class="close-ticket">
        If your issue is solved please rate our service,<br>

        <input type="radio" name="rateing" value="1">  &#x2605; <br>
        <input type="radio" name="rateing" value="2">  &#x2605;&#x2605;<br>
        <input type="radio" name="rateing" value="3">  &#x2605;&#x2605;&#x2605;<br>
        <input type="radio" name="rateing" value="4">  &#x2605;&#x2605;&#x2605;&#x2605;<br>
        <input type="radio" name="rateing" value="5">  &#x2605;&#x2605;&#x2605;&#x2605;&#x2605;<br>
          <input style="width: 225px;height: 41px;font-size: 17px;margin-left: 132px;border: 1px solid #b4b4ff;background-color: #447db4;color: white;" type="submit" name="rate" value="Rate And Submit">
       </div>
       </form> 
       
          <?php
    }
          ?>

  </div>


  <?php
include("inc/footer.php");
  ?>