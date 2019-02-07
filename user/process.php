<?php
session_start();
include('../plugins/connect.php');
//Product upload processing started --------------->

 $user_id=$_SESSION['user_id'];
 $shop_id=$_SESSION['shop_id'];
$buyer=$_SESSION['user_id'];
if(isset($_POST['up_p']))
{
	$cat_name=$_SESSION['category'];
	$sub_cat=$_POST['sub_cat'];
   $title=$_POST['title'];
   $details=$_POST['details'];
   $quantity=$_POST['quantity'];
   $price=$_POST['price'];
  
        $reg_date=date('Y-m-d');

          
                 $sql="SELECT p_id FROM product order by p_id desc limit 1";
              $r=$conn->query($sql);
              while($row = $r->fetch_assoc())
              {
               $p_id=$row['p_id']+1;
              }

         //Image Uploading ----->
         //Image Uploading ----->
         //Image Uploading ----->
         //Image Uploading ----->
         //Image Uploading ----->
         //Image Uploading ----->
     $ext= explode(".",$_FILES['pic']['name']);
    $c=count($ext);
    $ext=$ext[$c-1];
    $image_name=md5($p_id.$shop_id);
    $image=$image_name.".".$ext;

  // echo $target_file =basename($_FILES["pic"]["name"]);
   $target_file = $image;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image. <br>";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists. <br>";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded. <br>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], "uploads/$target_file")) {
     //   echo "The file ". basename( $_FILES["pic"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file. <br>";
    }
}
   
         //Image Uploading Ended----->
         //Image Uploading Ended----->
         //Image Uploading Ended----->
         //Image Uploading Ended----->
         //Image Uploading Ended----->
         //Image Uploading Ended----->
         
      

  
  //echo $cat_name.".".$sub_cat.".".$title.".".$details.".".$quantity.".".$price.".".$user_id.".".$shop_id.".".$target_file;
 $sql="INSERT INTO product(shop_id, p_title, p_details, pic, quantity, price, p_date, category, sub_cat) 
VALUES ('$shop_id','$title','$details','$target_file',$quantity,$price,'$reg_date','$cat_name','$sub_cat');";  

   // exit();
           $r = $conn->query($sql);
            if($r)
            {
               // echo "<span class='msg' >Successful</span>";
                 $_SESSION['msg']="<div class='pos-message'>
       Successfully uploaded! <br> Your Product is Now on sale!
                      </div>";

                 
             //    exit();
              header("Location:sell.php");
            
        }
        else
        {

                   $_SESSION['msg']=" <div class='neg-message'>
       Successfully NOT uploaded! <br> Your Product is NoT on sale!
     </div>";
           
        }
     
}
//Product upload processing Ended --------------->


//Checking Out Processing ------------------>

if(isset($_POST['checkout']))
{
  


$sql="SELECT order_id FROM orders ORDER BY order_id desc LIMIT 1";
       $r=$conn->query($sql);
    if($r-> num_rows > 0)
      while ($row=$r->fetch_assoc()) 
        $order_id=$row['order_id'];
        $order_id+=1;
   

     



    $sql="SELECT c.quantity,p.p_id,c.buyer_id,p.shop_id FROM cart c,product p where buyer_id=$user_id and c.p_id=p.p_id";
    $r=$conn->query($sql);
    if($r-> num_rows > 0)
      while ($row=$r->fetch_assoc()) {
        $qty=$row['quantity'];
        $p_id=$row['p_id'];
         $buyer=$row['buyer_id'];
         $shop_id=$row['shop_id'];
          $notified=0;
          $purchase_date=date("Y-m-d");

       $sql1="UPDATE product set quantity=quantity-$qty where p_id=$p_id;";
          $r1=$conn->query($sql1);
         
           if($r1)
            echo "UPdate query Successful for <br>".$p_id;
           else
            echo "Update query Execution error! <br>";


        $sql2="INSERT into orders(order_id,buyer_id,shop_id,p_id,quantity,notified,purchase_date)
        VALUES($order_id,$buyer,'$shop_id',$p_id,$qty,$notified,'$purchase_date')";
         $r2=$conn->query($sql2);
            
            if($r2)
            echo "<br> INSERT query Successful for ".$p_id;
           else
            echo "<br> INSERT query Execution error!";
      }

       $_SESSION['buyer']=$buyer;
       $_SESSION['order_id']=$order_id;
    $sql="Delete from cart where buyer_id=$user_id;";
   $r=$conn->query($sql);
   header("Location:checkedout.php");
   
}


//Check Out Processing Ended ----------------->
//Remove from Cart------------------->
if(isset($_GET['rmv']))
   {
    $cart_id=$_GET['cart_id'];
    $sql="Delete from cart where cart_id=$cart_id;";
    $r=$conn->query($sql);
   if($r)
     header('Location:cart.php');
   }
//Remove from Cart------------------>


   if(isset($_GET['buyNow']))
 {
    $p_id=$_GET['p_id'];
    $qty=$_GET['qty'];
    $keep_date=date("Y-m-d");

   
    
    //Getting info of product by id Start-------->
            $sql="SELECT p_title,pic,price from product where p_id=$p_id;";
            $r=$conn->query($sql);
           if($r -> num_rows == 1 )
            while($row=$r -> fetch_assoc())
            {
               $p_title=$row['p_title'];
               $pic=$row['pic'];
               $price=$row['price'];
              }
    //Getting info of product by id END-------->

            //Checking Whether the Product is in cart, Then Add to Quantity------>
              
               $sql="Select * from cart where p_id=$p_id and buyer_id=$buyer;";
               $r=$conn->query($sql);
               if($r-> num_rows == 0)
                {
//Inserting into CArt START ---------->
  $sql="INSERT INTO cart(p_id,buyer_id,quantity,keep_date)
                 VALUES ($p_id,$buyer,$qty,'$keep_date')";

  $r=$conn->query($sql);
       }
//Inserting into CArt END ---------->
                
              else
            {
              //Updating cart if same product Existed START ----------->
              $sql="UPDATE cart set quantity=quantity+$qty where p_id=$p_id;";

  $r=$conn->query($sql); 


              //Updating cart if same product Existed END----------->
            }
           

    //Checking Whether the Product is in cart, Then Add to Quantity END------>
   
   $buyNow=$_GET['buyNow'];
   $page=$_GET['page'];
if($buyNow==1)
    header("Location:cart.php");
  else
  header("Location:$page.php");
}
?>