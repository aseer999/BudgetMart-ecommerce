<?php
  include('plugins/connect.php');
  session_start();

 $_SESSION['err']=0;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Budget Mart</title>

	 <link rel="stylesheet" type="text/css" href="plugins/style.css">

</head>
<body>



<div class="nav-top">
	       <div class="nav-top-leftpart">
	       	 Welcome,
           <a href="login/">Sign In</a> Or
           <a href="Register/">Register</a> |
           <a href="#">Today's Deals</a> |
           <a href="#">Sell</a> |
           <a href="#">Contact</a> |
           <a href="#">FAQ</a>
	       </div>

         <div class="nav-top-rightpart">


      <!-- My Account Dropdown END-->
      <a href="#"><img src="plugins/images/notifications_icon.png"></a>
         <a href="#"><img src="plugins/images/messege.png"></a>
          <a href="#"><img src="plugins/images/cart.png"></a>
         </div>

	  </div>

   <div class="nav-mid">
   	 <a href="index.php"> <img src="plugins/images/logo.png"></a>
   	 <div class="nav-mid_search">
   	 	<input style="    font-size: 19px;
    font-family: monospace;
    padding-left: 12px;" type="text" name="search" placeholder="Search Any Product Here">
   	   <select>
   	   	     <option>All Catagories</option>
   	   	     <option>Art</option>
   	   	     <option>Books</option>
   	   	     <option>Cameras & Photo</option>
   	   	     <option>Cell Phones & Accessories</option>
   	   	     <option>Clothing,shoes & Accessories</option>
   	   	     <option>Computer &Networking</option>
   	   	     <option>Health & Beauty</option>

   	   </select>
   	   <input type="submit" name="" value="Search">
   	 </div>

   </div>
   <div class="nav-bar">
     <ul>
      <li><a href="#">Daily Deals</a></li>


    <!-- Fashion Dropdown Start-->
<?php
     $sql1="SELECT cat_name,cat_icon,cat_pic FROM category LIMIT 6;";
     $r1=$conn->query($sql1);
   if($r1->num_rows > 0)
 {

    while($cat_row = $r1->fetch_assoc())
    {
        $cat_name=$cat_row['cat_name'];
        $cat_icon=$cat_row['cat_icon'];
        $cat_pic=$cat_row['cat_pic'];
     ?>

   <li class="dropdown">
        <a class="dropbtn" href="#"><?php echo $cat_name; ?></a>
      <div class="dropdown-content">
  <table>
     <tr>
      <td><img src="plugins/images/<?php echo $cat_icon; ?>"></td>
    <td class="dropdown-content-data">
  <?php
     $sql="SELECT cat_name,sub_cat FROM category c,sub_category s WHERE cat_name='$cat_name' AND c.cat_id=s.cat_id LIMIT 4";
     $r=$conn->query($sql);
     if($r->num_rows > 0)
 {

    while($row = $r->fetch_assoc())
    {
        $sub_cat=$row['sub_cat'];
        echo "<a href='#'>$sub_cat</a>";
    }
 }
  ?>


    </td >
    <td class="dropdown-content-data">

            <?php
     $sql="SELECT cat_name,sub_cat FROM category c,sub_category s WHERE cat_name='$cat_name' AND c.cat_id=s.cat_id LIMIT 4,4";
     $r=$conn->query($sql);
     if($r->num_rows > 0)
 {

    while($row = $r->fetch_assoc())
    {
        $sub_cat=$row['sub_cat'];
        echo "<a href='#'>$sub_cat</a>";
    }
 }
  ?>


        </td>
   <td>
   <img class="drop-pic" src="plugins/images/<?php echo $cat_pic; ?>">
    </td>
   </tr>
  </table>
     </div>
    </li>



   <?php
    }
 }

?>
    <!-- Fashion Dropdown END -->


     </ul>
   </div>
   
 
 
 <div class="side-nav">
    <h3 style="text-align:center;color:white;">Side Navigation</h3> <hr>
    <h3 style="text-align:center;color:white;">All Categories</h3>
    <div class="all-menu">



    <?php
         
          $sql="SELECT cat_id,cat_name FROM category";
     $r=$conn->query($sql);
     if($r->num_rows > 0)
 {

    while($row = $r->fetch_assoc())
    {
          $cat_name=$row['cat_name'];
          $cat_id=$row['cat_id'];
?>


<button class="accordion" style="text-align:center;" > <?php echo $cat_name; ?> </button>
      <div class="panel">
         <ul>
       
     <?php
           $sql1="SELECT sub_cat FROm sub_category where cat_id=$cat_id";
     $r1=$conn->query($sql1);
     if($r1->num_rows > 0)
 {

    while($row1 = $r1->fetch_assoc())
    {
              $sub_cat=$row1['sub_cat'];

     ?>
 
         
          <a href="#"> <li>  <?php echo $sub_cat; ?>  </li> </a>
      
    <?php
   }
 
}
   ?>
         </ul>
      </div>




<?php
    }
}
    ?>



      


     
  
    </div>
  
  
  <form class="" action="index.html" method="post">
  
  <table style="background-color:#ccc;border-radius:10px;border:1px solid black;margin-top:10px;padding:5px;width:270px;">
    <tr>
      <td >   <h3 >Filter By:</h3> </td>
    </tr>
     <tr>
       <td>
  
         <input type="checkbox" name="price" value=""> Price:
         <select class="" name="">
           <option value="-"> - </option>
            <option value="0">0 </option>
            <option value="100">100  </option>
            <option value="1000">1000  </option>
            <option value=5000"">5000 </option>
            <option value="10000">10000</option>
         </select>
         to
         <select class="" name="">
             <option value="-"> - </option>
            <option value="100">100</option>
            <option value="500">500</option>
            <option value="1000">1000</option>
            <option value="5000">5000</option>
            <option value="all">All</option>
         </select>
  
       </td>
     </tr>
  
     <tr>
       <td>
  
         <input type="checkbox" name="cat_info" value=""> Category:
         <select class="" name="">
  
            <option value="0"> - </option>
            <option value="100">100  </option>
            <option value="1000">1000  </option>
            <option value=5000"">5000 </option>
            <option value="10000">10000</option>
         </select>
  
         <select class="" name="">
             <option value="-"> -</option>
            <option value="100">100</option>
            <option value="500">500</option>
            <option value="1000">1000</option>
            <option value="5000">5000</option>
            <option value="all">All</option>
         </select>
  
       </td>
     </tr>
     <tr>
       <td style="text-align:center;">
         <input type="submit" name="search" value="Search">
       </td>
     </tr>
  </table>
  
  
  
  
  </form>
  
  
  
  
  </div>
 
 
	




<!-- SlidShow Start -->


	<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="plugins/images/slide_1.jpg">
    
  </div>

<div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
   <img src="plugins/images/slide_2.jpg">
   
  </div>

<div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
   <img src="plugins/images/slide_3.jpg">
 
  </div>

		</div>




<!-- SlidShow End -->




<!-- Section Portion -------------->

  <div class="section">
     <h1>Our Latest Products</h1>  <br>
		       <div class="ad-post">
		       	  <table>
            <tr style="background-color: white;"><th ><a href="# "><img style="width: 30%;" src="plugins/images/watch_1.jpg"> </a> </th></tr> 
              <tr ><td><a href="#"><h3 style="margin:0;text-align: center;">Product Title</h3> </a> </td></tr>

                
                  <tr ><td><p style="overflow: auto;">
                  details about shop details about shop details about shop details about shop
                  details about shop details about shop details about shop details about shop
                 
                 </p></td></tr>
              </table>
          </div>

          <div class="ad-post">
              <table>
            <tr style="background-color: white;"><th ><a href="# "><img style="width: 30%;" src="plugins/images/watch_1.jpg"> </a> </th></tr> 
              <tr ><td><a href="#"><h3 style="margin:0;text-align: center;">Product Title</h3> </a> </td></tr>

                
                  <tr ><td><p style="overflow: auto;">
                  details about shop details about shop details about shop details about shop
                  details about shop details about shop details about shop details about shop
                 
                 </p></td></tr>
              </table>
          </div>

          <div class="ad-post">
              <table>
            <tr style="background-color: white;"><th ><a href="# "><img style="width: 30%;" src="plugins/images/watch_1.jpg"> </a> </th></tr> 
              <tr ><td><a href="#"><h3 style="margin:0;text-align: center;">Product Title</h3> </a> </td></tr>

                
                  <tr ><td><p style="overflow: auto;">
                  details about shop details about shop details about shop details about shop
                  details about shop details about shop details about shop details about shop
                 
                 </p></td></tr>
              </table>
          </div>

          <div class="ad-post">
              <table>
            <tr style="background-color: white;"><th ><a href="# "><img style="width: 30%;" src="plugins/images/watch_1.jpg"> </a> </th></tr> 
              <tr ><td><a href="#"><h3 style="margin:0;text-align: center;">Product Title</h3> </a> </td></tr>

                
                  <tr ><td><p style="overflow: auto;">
                  details about shop details about shop details about shop details about shop
                  details about shop details about shop details about shop details about shop
                 
                 </p></td></tr>
              </table>
          </div>

          <div class="ad-post">
              <table>
            <tr style="background-color: white;"><th ><a href="# "><img style="width: 30%;" src="plugins/images/watch_1.jpg"> </a> </th></tr> 
              <tr ><td><a href="#"><h3 style="margin:0;text-align: center;">Product Title</h3> </a> </td></tr>

                
                  <tr ><td><p style="overflow: auto;">
                  details about shop details about shop details about shop details about shop
                  details about shop details about shop details about shop details about shop
                 
                 </p></td></tr>
              </table>
          </div>

          <div class="ad-post">
              <table>
            <tr style="background-color: white;"><th ><a href="# "><img style="width: 30%;" src="plugins/images/watch_1.jpg"> </a> </th></tr> 
              <tr ><td><a href="#"><h3 style="margin:0;text-align: center;">Product Title</h3> </a> </td></tr>

                
                  <tr ><td><p style="overflow: auto;">
                  details about shop details about shop details about shop details about shop
                  details about shop details about shop details about shop details about shop
                 
                 </p></td></tr>
              </table>
          </div>



          

         <h2><a href="#">View All Deals</a></h2>



	</div>






  <div class="footer">
		  <ul>
		  	 <li><a href="#">Buy</a></li>
		  	 <li><a href="#">Registration</a></li>
		  	 <li><a href="#">BudgetMart Money Back Guerantee</a></li>
		  	 <li><a href="#">Stores</a></li>
		  	 <li><a href="#">BudgetMart Guide</a></li>
		  </ul>
		  <ul>
		  	<li><a href="#">Sell</a></li>
		  	<li><a href="#">Start Selling</a></li>
		  	<li><a href="#">Learn to sell</a></li>
		  </ul>
		  <ul>
		  	 <li><a href="#">Tools</a></li>
		  	 <li><a href="#">Developers</a></li>
		  	 <li><a href="#">Security Center</a></li>
		  </ul>
		  <ul>
		  	<li><a href="#">Stay Connected</a></li>
		  	<li><a href="#">Facebook</a></li>
		  	<li><a href="#">Twitter</a></li>
		  	<li><a href="#">Google+</a></li>
		  </ul>
		  <p>
		  	Copyright &copy;2018 BudgetMart Inc.All rights Reserved.
		  </p>
	</div>



<script src="plugins/myScript.js"></script>
</body>
</html>
