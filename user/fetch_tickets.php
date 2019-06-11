 <?php
include("plugins/connect.php");
session_start();
$user_id=$_SESSION['user_id'];
 ?>
 Your active tickets <br>
         <table class="tickets-view">
             <tr>
               <th>ID</th><th>Status</th>
             </tr>

  <?php
   $sql = "SELECT ticket_id, closed from tickets where user_id=$user_id ";
   $r=$conn->query($sql);

   while ($row=$r->fetch_assoc()) {
      $ticket_id = $row['ticket_id'];
      $closed = $row['closed'];
   
  ?>


             <tr >
               <td ><a 
<?php
 $sql1 = "SELECT user_id FROM msg WHERE ticket_id=$ticket_id ORDER BY id DESC LIMIT 0,1  ";
 $r1 = $conn->query($sql1);
 if($r1->num_rows==1)
 {
   while ($row1=$r1->fetch_assoc()) {
   $user_id = $row1['user_id'];

 }
 }

 if(isset($user_id) && $user_id==999)
 {
?>
 
style="background-color: #ff6700;
color: white;
text-decoration: none;
padding: 16px;" 
<?php
 }
?>


href="response.php?ticket_id=<?php echo $ticket_id; ?>">#<?php echo $ticket_id; ?></a></td>

               <td>
               <?php
                if($closed == NULL)
                  echo "Active";
                else
                  echo "Closed";
               ?>
               </td>
             </tr> 
             
             
<?php
 }
?>
             

         </table>