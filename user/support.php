<?php
include("inc/header.php");
$user_id = $_SESSION['user_id'];
unset($_SESSION['ticket_id']);
?>


<!-- Section Portion -------------->

  <div class="main-section">
      <h2 style="text-align: center;">Support</h2>
      <form action="process_addTicket.php" method="post">
        
      
    <div class="open-ticket">
        Subject:<br>
       <input 
        style="margin: auto;width: 303px;height: 42px;font-size: 20px;" type="text" name="subject">
       <br><br>
       State Your Issue:<br>
<!--        <input type="text" name="issue"> -->
          <textarea
          style="width: 390px;height: 216px;margin: auto;font-size: 18px;"
           name="issue"></textarea>
      <input style="width: 214px;height: 65px;font-size: 20px;margin-top: 20px;" type="submit" name="add_ticket" value="Submit">
</div>

</form>


   <div class="tickets" id="tickets">
         
       </div> 
      
           

  </div>


  <?php
include("inc/footer.php");
  ?>