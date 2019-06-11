<?php
include("inc/header.php");
?>


<!-- Section Portion -------------->

  <div class="main-section">
      <h2 style="text-align: center;">Your Cart</h2>
    <div class="in-cart">


<?php
//cart view->

   $sql="SELECT cart_id,p_title,pic,c.quantity,price FROM cart c,product p where p.p_id=c.p_id and c.buyer_id=$buyer";
  $r=$conn->query($sql);
    $total_qty=0;
    $total_price=0;
  if($r-> num_rows > 0 )
   while($row=$r -> fetch_assoc())
   {
       $p_title=$row['p_title'];
       $pic=$row['pic'];
       $price=$row['price'];
       $quantity=$row['quantity'];
       $cart_id=$row['cart_id'];
      
       $total_qty+=$quantity;
       $total_price+=$price*$quantity;
?>
          <div class="rowcart"><table style="border-collapse: collapse;width:480px;">
         <tr><td><div class="p-img-cart">
          <img style="max-width:100%;max-height:100%;" src="uploads/<?php echo $pic; ?>">
         </div>
       </td><td><?php echo $p_title; ?></td><td>Quantity: <input value="<?php echo $quantity; ?>" type="number" style="width:53px;" disabled></td><td>US $<?php echo $price; ?><br><span style="color: #696969;"><i>Free shipping<i><span></span> <br> </td></tr>
       </table>
            <a style="padding: 10px;margin-left: 387px;font-size: 19px;" href="process.php?cart_id=<?php echo $cart_id; ?>&rmv=1">
            Remove</a>
        </div>

<?php
     //  echo $p_title."-".$pic."-".$price."-".$quantity."-".$cart_id."<br>";
    //  echo "<a href='?cart_id=$cart_id&rmv=1'>Remove</a><br>";
   }
   else
    echo "No Products in the cart";

   $sql="Select address from users where user_id=$buyer;";
   $r=$conn->query($sql);
   if($r-> num_rows ==1 )
    while ($row=$r-> fetch_assoc())
      $address=$row['address'];
      
    $_SESSION['address']=$address;
    $_SESSION['cart_items']=$total_qty;

?>
</div>
   <div class="checkout">
         <table style="border-collapse: collapse;width:260px;">
              <tr>
                <td>Items(<?php echo $total_qty; ?>)</td><td>US $<?php echo $total_price; ?></td>
              </tr>
              <tr>
                <td>Shipping</td> <td>$0.00</td>
              </tr>
         </table>
         <hr>
         Total : US $<?php echo $total_price; ?>  <br>
      
<form action="process.php" method="post">
      <input style="padding: 20px;color: white;background-color: #1c4c86;margin-top: 30px;font-size: 19px;" type="submit" name="checkout" value="Check Out">

</form>
      <p style="font-size: 14px;">
             Shipping Address: <br>
             <span style="color: green;"> 
                     <?php echo $address; ?>
             </span> 
             <br>
             <span style="">
              <code>[If the address is not correct please update it From <a href="#">Settings</a> .]</code> 
             </span>
            </p>
       </div>
           

  </div>


  <?php
include("inc/footer.php");
  ?>