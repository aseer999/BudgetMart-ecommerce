<?php
include("../plugins/connect.php");
  session_start();
  if (!isset($_SESSION['admin'])) {
       $_SESSION['err']=3;
      header("Location:../login/");
  }
?> 
<!DOCTYPE html>

<html>
<head>
	<title>Categories</title>
  <link rel="stylesheet" type="text/css" href="style.css">

   <script type="text/javascript" src="jquery-3.3.1.slim.js"></script>
<script type="text/javascript" src="jquery-3.3.1.js"></script>

</head>
<body>
    <div class="full-page">
    	 <div class="header">
    	 	        <h1 style="margin=0;"><a href="index.php">Admin Panel</a> </h1> 
                    <a class="logout" href="../plugins/process.php?logout=1">log Out</a>
                    <div class="h-content">
                        <input type="text" name="search" placeholder="User's name / Category / Order_ID/Any Product">
                    <select style="width: 100px;
    height: 41px;">
                        <option  value="users">Users</option>
                        <option value="category">Categories</option>
                        <option value="orders">Order_ID</option>
                        <option value="product">Products</option>
                    </select>
                    <input type="submit" name="search" value="Search"> 
                  
                    </div>
                    
    	 </div>
    	 <div class="side-nav">
    	 	
    	 	    <ul>
                  <li style="margin-top: 130px;"> <a href="users.php">Users</a>  </li>     
                   <li><a href="categories.php">Categories</a></li>
                   <li><a href="orders.php">Orders</a> </li>
                  <li> <a href="products.php">All Products</a> </li>
                  <li><a href="changePassword.php">Change Password</a> </li>

                  <li><a href="tickets.php">Tickets</a> </li>

                </ul>
    	 	  	  
    	 	  	   
    	 	  	   
    	 	  	  
    	 	  
    	 </div>