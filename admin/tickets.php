<?php
include("inc/header.php");
unset($_SESSION['ticket_id']);
?>


<div class="section">
<?php

      if(isset($_SESSION['ask']) && $_SESSION['ask']==1)
      {
      	$id = $_SESSION['id'];
    	$R=$_SESSION['R'];
    	$attr=$_SESSION['attr'];
    	$page=$_SESSION['page'];
      	include("inc/confirm_del.php");
      }

     if(isset($_SESSION['success']))
     {
     	include("inc/success_msg.php");
     	unset($_SESSION['success']);
     }
    
    ?>

	
	<div class="data-view">
		<table>
		<tr>
			<th>Ticket ID</th>
			<th>User ID</th>
			<th>Subject</th>
			<th>Rating</th>
			<th>Status</th>
			<th>Action</th>
			
			
		</tr>

<?php
  $sql="SELECT ticket_id, user_id, subject, rating from tickets";
  $r=$conn->query($sql);
  while ($row=$r->fetch_assoc()) {
  $ticket_id=$row['ticket_id'];
  	$user_id=$row['user_id'];
  	$subject=$row['subject'];
  	$rating=$row['rating'];


 ?>  

<tr style="height: 65px;">
			<td><a href="response.php?ticket_id=<?php echo $ticket_id; ?>"><?php echo $ticket_id; ?></a> </td>
			<td><?php echo $user_id; ?></td>
			<td><?php echo $subject; ?></td>
			<td><?php 
              if($rating==NULL)
              	echo "PENDING";
              else
			    echo $rating; ?></td>
			<td>
             <?php
           $sql1="SELECT notified FROM msg WHERE user_id != 999 and ticket_id = $ticket_id";
           $r1 = $conn->query($sql1);
           while ($row1=$r1->fetch_assoc()) {
           	   $notified = $row1['notified'];

           }
               if($notified==0)
               	echo "Not Seen";
               else if($notified==1)
               	echo "Seen";
               else if($notified==2)
               	echo "Replied";
             ?>

			</td>
			<td><a href="process.php?ask=1&R=tickets&id=<?php echo $ticket_id; ?>&att=ticket_id&page=tickets">
				<img width="25px" style="margin-left: 10px;" src="images/del.png">
			</a> 
			
				</td>



 <?php
  }
?>

		
			
		</tr>





	</table>
	</div>
	
</div>

<?php
include("inc/footer.php");
?> 