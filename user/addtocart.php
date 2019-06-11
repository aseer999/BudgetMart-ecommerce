<?php
 include('plugins/connect.php');
session_start();
$buyer=$_SESSION['user_id'];
 extract($_POST);
 //echo "Passed";

 if(isset($_POST['buyNow']))
 {
 	
 echo $p_id = $_POST['p_id'];
 	$qty = $_POST['qty'];


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
   echo "Passed";

 }
?>