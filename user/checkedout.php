<?php
include("inc/header.php");
  ?>


	
<!-- Section Portion -------------->

  <div class="main-section">
      <h2 style="text-align: center;">Order Completion </h2>
    
       <div class="checkedout"> 

     
       <table class="checkedout-info">
               
                 <?php

 $order_id=$_SESSION['order_id'];
 $address=$_SESSION['address'];
   $sql="SELECT DISTINCT(order_id),f_name,l_name,address,purchase_date FROM orders,users WHERE user_id=buyer_id and order_id=$order_id";
   $r=$conn-> query($sql);
   while ($row=$r-> fetch_assoc()) {
     $order_id=$order_id;
    $f_name=$row['f_name'];
    $l_name=$row['l_name'];
    $address=$row['address'];
   
    $purchase_date=$row['purchase_date'];
  }
   ?>





              
                 <tr>
                   <td>Order No: </td> <td colspan="4"> <?php echo $order_id; ?> </td> 
                 </tr>
                 <tr>
                   <td>Customer Name:</td><td colspan="4"><?php echo "$f_name $l_name"; ?> </td> 
                 </tr>
                 <tr>
                   <td>Address:</td><td colspan="4"><?php echo $address; ?> </td> 
                 </tr>
                  <tr>
                   <td>Date:</td><td><?php echo $purchase_date; ?> </td> <td colspan="4"></td>
                 </tr>
                  <tr>
                    <th>ID</th> <th>Title</th><th>Quantity</th><th>Price</th><th>Total</th>
                  </tr>

<?php
$sql="SELECT p_title,price,o.quantity FROM orders o,product p WHERE order_id=$order_id and o.p_id=p.p_id";
   $r=$conn-> query($sql);
   $x=1;
   $total=0;
 //  echo $order_id;
 
   while ($row=$r-> fetch_assoc()) {
    
    $p_title=$row['p_title'];
    $quantity=$row['quantity'];
    $price=$row['price'];
    $tot=$quantity*$price;
    $total+=$tot;
?>



                  <tr>
                    <td><?php echo $x++; ?></td> <td><?php echo $p_title; ?></td><td><?php echo $quantity; ?></td><td>$<?php echo $price; ?>/-</td><td>$<?php echo $tot; ?>/-</td>
                  </tr>
                  
              
     
   <?php


   }
      ?> 
      <tr>
        <td colspan="4"></td><td><b style="color: #d40000;">Total=$<?php echo $total; ?>/-<b></td>
      </tr>
                </table>
               
           <p>Yoy will Receive your items within 14-17 bussiness days.If you didn't receive your items. please let us know.<br>
            Thank you for being with us.<br>
            Come back again!
            Best Regards,
            BudgetMart Online Shop.
          </p>
       </div>











    </div>
      
           





  </div>






<?php
include("inc/footer.php");
  ?>
