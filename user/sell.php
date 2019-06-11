 <?php
include("inc/header.php");
  ?>

	
<!-- Section Portion -------------->

  <div class="main-section">
      <h2 style="text-align: center;">Upload Your Product</h2>
    <div class="upload-p">
      
             Select Category:

<form method="post" action="sell.php" style="display: inline;">

  <select name="cat_id"  onchange="this.form.submit();" >
      <option value="">
           <?php
             //  if(isset($_SESSION['category']))
             //   echo $_SESSION['category'];
             //  else
                echo "-";
           ?>


      </option>
  
   
    <?php
  $sql="SELECT cat_id,cat_name FROM category;";
  $r=$conn->query($sql);

   if($r->num_rows > 0)
 {
    
    while($row = $r->fetch_assoc())
    {
       $cat_id=$row['cat_id'];
       $cat_name=$row['cat_name'];
    ?>
  
  <option value="<?php echo $cat_id; ?>"> <?php echo $cat_name;?> </option>
  
  <?php
    }
}
  ?>
  
  
</select>
</form>



          
          <?php
   if(isset($_POST['cat_id']))
   {
   $cat_id=$_POST['cat_id'];
   }
?>

<?php
   $sql="select cat_name from category where cat_id=$cat_id";
   $r=$conn->query($sql);
   while($row = $r->fetch_assoc())
    {
       $category=$row['cat_name'];
     //  $_SESSION['category']=$category;
    }
   $_SESSION['category']=$category;
?>

<!--Category Seleted:<span style="color: blue;font-weight: bold;font-size: 20px;"> <?php echo $category; ?> </span> <br>  -->
 <form method="post" action="process.php" enctype="multipart/form-data">

  <select name="sub_cat">

   <?php
  $sql="SELECT sub_cat FROM sub_category where cat_id=$cat_id;";
  $r=$conn->query($sql);

   if($r->num_rows > 0)
 {
    
    while($row = $r->fetch_assoc())
    {
       $sub_cat=$row['sub_cat'];
    ?>
  
  <option value="<?php echo $sub_cat; ?>"> <?php echo $sub_cat;?> </option>
  
  <?php
    }
}
  ?>


</select>
           <br>
           
         Product Title:  <input type="text" name="title"> <br>
         Product Details:  <input type="text" name="details"><br>
         Product Picture:  <input type="file" name="pic"><br>
          Quantity: <input type="number" name="quantity"><br>
          Price: <input type="number" name="price"><br>
           <input type="submit" value="Submit" name="up_p"><br>
       </form>
    </div>
       
              
   
                  <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                    }
                  ?>

  </div>

  <?php
include("inc/footer.php");
  ?>
