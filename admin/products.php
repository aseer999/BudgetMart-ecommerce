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
      

	<input style="margin: 20px;" type="submit" name="add_new" value="Add New Product">
	<div class="data-view">
		<table>
		<tr>
			<th>Product ID</th>
			<th>Shop ID</th>
			<th>Title</th>
			<th>Details</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Date</th>
			<th>Category</th>
			<th>Sub-Category</th>
			<th>Action</th>
			
			
		</tr>

<?php
  $sql="SELECT p_id,shop_id,p_title,p_details,quantity,price,p_date,category,sub_cat FROM product";
  $r=$conn->query($sql);
  while ($row=$r->fetch_assoc()) {
  	 $p_id=$row['p_id'];
     $shop_id=$row['shop_id'];
     $p_title=$row['p_title'];
     $p_details=$row['p_details'];
     $quantity=$row['quantity'];
     $price=$row['price'];
     $p_date=$row['p_date'];
     $category=$row['category'];
     $sub_cat=$row['sub_cat'];


 ?>  

<tr>
			<td><a href="#"><?php echo $p_id; ?></a> </td>
			<td><?php echo $shop_id; ?></td>
			<td><?php echo $p_title; ?></td>
			<td><?php echo $p_details; ?></td>
			<td><?php echo $quantity; ?></td>
			<td><?php echo "$".$price."/="; ?></td>
			<td><?php echo $p_date; ?></td>
			<td><?php echo $category; ?></td>
			<td><?php echo $sub_cat; ?></td>
			<td><a href="process.php?ask=1&R=product&id=<?php echo $p_id; ?>&attr=p_id&page=products">
				<img width="18%" style="margin-left: 10px;" src="images/del.png">
			</a> <a href="#2">
				<img width="18%" style="margin-left: 20px;" src="images/edit.png">
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