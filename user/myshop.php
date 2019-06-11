<?php
 include("inc/header.php");
?>

<div class="main-section">
	<h1 style="text-align: center;
    font-family: cursive;
    font-size: 40px;
    color: #162448;"">Your Shop</h1>  <br>
          
      <?php

      $sql="SELECT p_id,pic,p_title,p_details,price FROM product where shop_id='$shop_id'";
     $r=$conn->query($sql);
 
   if($r->num_rows > 0)
 {
    
    while($row = $r->fetch_assoc())
    {    $p_id = $row['p_id'];
         $pic = $row['pic'];
         $p_title = $row['p_title'];
         $p_details = $row['p_details'];
         $price = $row['price'];


      ?>


           <div class="ad-post">
              <table>
            <tr style="background-color: white;"><th ><a href="productView.php?p_id=<?php echo $p_id; ?>"><img style="width: 50%;" src="uploads/<?php echo $pic; ?>"> </a> </th></tr> 
              <tr ><td><a href="productView.php?p_id=<?php echo $p_id; ?>"><h3 style="margin:0;text-align: center;"> <?php echo $p_title; ?> </h3> </a> </td></tr>

                <tr><td style="text-align: center;color: #6d6aff;font-weight: bold;"> <?php echo "$".$price; ?> </td></tr>
                  <tr ><td><p style="overflow: auto;">
                      <?php echo $p_details; ?>
                 </p></td></tr>


                
               
              </table>
          </div>


          <?php
    }
}
          ?>

          

          



          

      <!--   <h2><a href="#">View All Deals</a></h2>  -->


</div>
<?php
include("inc/footer.php");
?>