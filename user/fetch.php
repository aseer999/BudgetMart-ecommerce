<?php 
session_start();
include("plugins/connect.php");
$ticket_id=$_SESSION['ticket_id'];
   $sql = "SELECT DISTINCT(responses), user_id FROM msg WHERE ticket_id=$ticket_id";
   $r = $conn->query($sql);

            while ($row=$r->fetch_assoc()) {
             // $ticket_id = $row['ticket_id'];
             
               $responses = $row['responses'];
               $sender = $row['user_id'];
                 ?>
      
      <div 
        <?php
         if($sender==999)
          echo 'class="admin-response"';
         else
          echo 'class="user-response"';
        ?>
      >

<?php
echo $responses;
?> 
     </div>

<?php
            }
           ?>
