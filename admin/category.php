
<!DOCTYPE html>
<html>
<head>
	
	<title>Category</title>
    
      <style type="text/css">
      	
      	table{
      		margin-top: 100px;
      	}
      	table,th,tr,td{
      		border: 1px solid black;
            border-collapse: collapse;
      	}
      </style>
</head>
<body>

<?php
 include('../plugins/connect.php');
?>
<form method="post" action="category.php">

	Categories:
	<select name="cat_id"  onchange="this.form.submit();" value="fee" autofocus>
	    <option value="">- </option>
	
   
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
    }
   
?>

Category Seleted:<span style="color: blue;font-weight: bold;font-size: 20px;"> <?php echo $category; ?> </span> <br>
 Sub-Categories:
<select name="">

   <?php
  $sql="SELECT sub_cat FROM sub_category where cat_id=$cat_id;";
  $r=$conn->query($sql);

   if($r->num_rows > 0)
 {
    
    while($row = $r->fetch_assoc())
    {
    	 $sub_cat=$row['sub_cat'];
    ?>
	
	<option value="<?php echo $cat_id; ?>"> <?php echo $sub_cat;?> </option>
	
	<?php
    }
}
	?>


</select>
  
 <form action="category.php" method="post">
	Add Category:
   <input type="text" name="new_cat"> <br>
   <input type="submit" name="add_cat" value="Add">
</form>



 <form action="category.php" method="post">
	Add sub-Category Under <span style="color: blue;font-weight: bold;"> <?php echo $category; ?> </span>  :
   <input type="text" name="new_subcat"> <br>
   <input type="submit" name="add_subcat" value="Add">
</form>




 

<?php
   if(isset($cat_id))
   {

 	?>
<table>
	  <tr>
	  	<th>Category Icon</th> <th>Category Picture</th>
	  </tr>

    
<?php
  $sql="SELECT cat_icon,cat_pic FROM category where cat_id=$cat_id;";
  $r=$conn->query($sql);

   if($r->num_rows > 0)
 {
    
    while($row = $r->fetch_assoc())
    {
    	 $cat_icon=$row['cat_icon'];
    	 $cat_pic=$row['cat_pic'];
    	 if($cat_pic!=null && $cat_icon!=null)
    	 {


    ?>

     <tr>
    	<td> <img src="../plugins/images/<?php echo $cat_icon; ?>"> </td> 
    	<td> <img src="../plugins/images/<?php echo $cat_pic; ?>"> </td>
    </tr>
    

    <?php
        }
        else
        {
        	echo "<tr> <td>NO icon</td> <td>NO Picture</td></tr>";
        }
    }
}
	?>


</table>

 <?php
   }
?>

   

</body>
</html>

<?php 
  if(isset($_POST['add_cat']))
  {
  	$new_cat=$_POST['new_cat'];
  	$sql="INSERT INTO category(cat_name) VALUES('$new_cat')";
      $r=$conn->query($sql);
    
    if($r)
    {
    	echo "Successfully Category Added!";
    }
    else
    {
    	echo "Something Went Wrong!";
    }

   
  }

  if(isset($_POST['add_subcat']))
  {
  	$new_cat=$_POST['new_subcat'];
  	$sql="INSERT INTO sub_category(cat_id,cat_name) VALUES($cat_id,'$new_cat')";
      $r=$conn->query($sql);
    
    if($r)
    {
    	echo "Successfully Sub-Category Added!";
    }
    else
    {
    	echo "Something Went Wrong!";
    }

   
  }



?>


