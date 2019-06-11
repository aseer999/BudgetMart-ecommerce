<?php
include("inc/header.php");

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

	<input style="margin: 20px;" type="submit" name="add_new" value="Add New User">
	<div class="data-view">
		<table>
		<tr>
			<th>Order ID</th>
			<th>Buyer ID</th>
			<th>Notified</th>
			<th>Purchase Date</th>
			<th>Action</th>
			
			
		</tr>

<?php
  $sql="SELECT DISTINCT(order_id),buyer_id,notified,purchase_date FROM orders";
  $r=$conn->query($sql);
  while ($row=$r->fetch_assoc()) {
  	$order_id=$row['order_id'];
  	$buyer_id=$row['buyer_id'];
  	$notified=$row['notified'];
  	$purchase_date=$row['purchase_date'];


 ?>  

<tr>
			<td><a href="#"><?php echo $order_id; ?></a> </td>
			<td><?php echo $buyer_id; ?></td>
			<td><?php echo $notified; ?></td>
			<td><?php echo $purchase_date; ?></td>
			<td><a href="process.php?ask=1&R=orders&id=<?php echo $order_id; ?>&attr=order_id&page=orders">
				<img width="25px" style="margin-left: 10px;" src="images/del.png">
			</a> <a href="#2">
				<img width="25px" style="margin-left: 20px;" src="images/edit.png">
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