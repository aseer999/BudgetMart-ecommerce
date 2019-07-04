<?php

include("inc/header.php");
  $sql="SELECT COUNT(user_id) as total_user FROM users ";
  $r=$conn->query($sql);
  while ($row=$r-> fetch_assoc()) {
  	 $total_user=$row['total_user'];
  }
   $sql="SELECT COUNT(p_id) as total_products FROM product";
  $r=$conn->query($sql);
  while ($row=$r-> fetch_assoc()) {
  	 $total_products=$row['total_products'];
  }
    
    
    $sql="SELECT COUNT(DISTINCT(order_id)) as total_orders FROM orders";
  $r=$conn->query($sql);
  while ($row=$r-> fetch_assoc()) {
  	 $total_orders=$row['total_orders'];
  }
?>


<div class="section" >

<div class="count-user">
	<img width="100%" src="images/three.gif">
	<span><?php echo $total_user; ?>  Users</span>
</div>	

<div class="count-product">
	<img width="100%" src="images/products.gif">
<span><?php echo $total_products; ?> Products</span>
</div>

<div class="count-order">
	<img width="100%" src="images/orders.gif">
	<span><?php echo $total_orders; ?> Orders</span>
</div>


</div>

<?php
include("inc/footer.php");
?>

