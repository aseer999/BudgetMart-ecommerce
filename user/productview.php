<?php
include("inc/header.php");
   if(isset($_GET['p_id']))
   {
   	$_SESSION['p_id']=$_GET['p_id'];
   	$p_id=$_SESSION['p_id'];
   
   }

   if(isset($_SESSION['p_id']))
   {
   	$p_id=$_SESSION['p_id'];
   }
    $sql="SELECT p_title,price,quantity,p_details,pic FROM product WHERE p_id=$p_id";
    $r=$conn->query($sql);
    while ($row=$r -> fetch_assoc()) {
    	$p_title=$row['p_title'];
    	$price=$row['price'];
    	$quantity=$row['quantity'];
    	$p_details=$row['p_details'];
    	$pic=$row['pic'];

    }

?>
<div class="main-section">
      <h2 style="text-align: center;">Product Details</h2>
          
       <div class="product_view">
           <img style="max-width: 100%;
    max-height: 100%;" src="uploads/<?php echo $pic; ?>">
       </div>
       <form action="process.php">
       	<table style="border-spacing: 19px;
    /* text-align: center; */
    font-size: 20px;">
            <tr><td>  Title: </td> <td>  <?php echo $p_title; ?> </td>  </tr>
            <tr><td>  Price: </td> <td>  $<?php echo $price; ?>//- </td>  </tr>
            <tr><td>  Quantity: </td> <td>  <?php echo $quantity; ?> pieces </td>  </tr>
            <tr><td>  Details: </td> <td>  <?php echo $p_details; ?> </td>  </tr>
            <tr><td style="color: #bf0202;">  Purchase Quantity: </td> <td> <input style="width: 70px;
    height: 15px;
    border: 1px solid #bf0202;
    font-size: 20px;
    padding: 10px;" type="number" name="qty" value="1"> </td>  </tr>
            
      </table>
              
               <input type="hidden" name="page" value="productview">
               <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
               <input type="hidden" name="buyNow" value="0">
                <input style="margin-left: 133px;" class="cartbtn" type="submit" name="" value="Add To Cart">
              
           <input class="buybtn" type="submit" name="" value="Buy Now(A)">
       </form>
      
  </div>


<?php
include("inc/footer.php");
?>