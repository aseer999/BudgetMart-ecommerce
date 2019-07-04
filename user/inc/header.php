<?php
include('plugins/connect.php');
  session_start();
    $buyer=$_SESSION['user_id'];
    $user_id=$_SESSION['user_id'];
    $shop_id=$_SESSION['shop_id'];
  if (!isset($_SESSION['user'])) {
       $_SESSION['err']=3;
      header("Location:../login/");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Budget Mart</title>
	
	 <link rel="stylesheet" type="text/css" href="plugins/style.css">

  <script type="text/javascript" src="plugins/jquery-3.3.1.slim.js"></script>
<script type="text/javascript" src="plugins/jquery-3.3.1.js"></script>
<script src="plugins/myScript.js"></script>

</head>
<body>


	
<div class="nav-top">
	       <div class="nav-top-leftpart">
	       	 Hi, Ishraqul
         <!--  <a href="login/">Sign In</a> Or
           <a href="Register/">Register</a> | -->
           <a href="#">Today's Deals</a> |
           <a href="sell.php">Sell</a> |   
           <a href="#">Contact</a> |

           <a href="#">FAQ</a> |  
            <a href="support.php">Support</a>
      




           <a href="#">FAQ</a>

	       </div>
	 	
         <div class="nav-top-rightpart">
          <!-- My Account Dropdown Start-->
         <div class="dropdown1">
            <a class="dropbtn1" href="#">My Account &#x25BE;</a> 
            <div class="dropdown1-content">
              <a href="profile.php">Profile</a>
              <a href="settings.php">Settings</a>
              <a href="myshop.php">My Shop</a>
              <a href="sell.php">Sell</a>

              <a href="../plugins/process.php?logout=1">Log Out &#x21F0;</a>
            </div>
          </div>  
           
      <!-- My Account Dropdown END-->
      <a href="#"><img src="plugins/images/notifications_icon.png"></a>  
         <a href="#"><img src="plugins/images/messege.png"></a>  
          <a href="cart.php"><img src="plugins/images/cart.png"></a>  

          <span id="cart_amount" style="background-color: #ff6700;
    color: #ffffff;
    border-radius: 5px;
    padding: 7px;
    font-size: 26px;"> </span>

          

          
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
      <li><a href="product.php">Daily Deals</a></li>


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
            <option value="5000">5000 </option>
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
