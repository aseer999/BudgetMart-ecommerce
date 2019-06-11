<?php
include("plugins/connect.php");
session_start();
  $buyer=$_SESSION['user_id'];
    $user_id=$_SESSION['user_id'];

    
          $sql="SELECT sum(quantity) as sum_qty FROM cart WHERE buyer_id=$buyer;";
          $r=$conn->query($sql);
          if($r-> num_rows > 0)
            while ($row=$r-> fetch_assoc()) {
              $cart_sum=$row['sum_qty'];
              if($cart_sum !=null)
              echo $cart_sum;
            else
              echo 0;
            }
 ?>