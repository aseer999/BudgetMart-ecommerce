<?php
include("inc/header.php");

?>

    	 <div class="section">
    	 	            <div class="cat-view">
    	 	            	<h2 style="text-align: center;">Categories</h2>
    	 	            	<div class="cat-tab">
    	 	            		<table>
    	 	            		 <tr>
    	 	            		   <th>Category Name</th><th>Action</th>
    	 	            		 </tr>
    	 	            		 


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
    
   <tr><td><a href="?catno=<?php echo $cat_id; ?>"> <?php echo $cat_name;?> </a></td><td><input type="submit" name="del_cat" value="Delete"> <input type="submit" name="edit_cat" value="Edit"></td>
   </tr>
    
    <?php
    }
}
    ?>

                                 
    	 	            		 
    	 	            		
    	 	            	</table>
    	 	            	</div>
    	 	            	<input style="margin-top: 8px;" type="text" name="add-cat">
    	 	            	<input type="submit" name="add-cat" value="Add">
    	 	            </div>
    	 	            <div class="sub-cat">
    	 	            	<h2 style="text-align: center;">Sub-Categories of<span style="color: blue;font-weight: bold;"> Fashion </span> </h2>
    	 	            	<div class="cat-tab">
    	 	            		
  <?php
         if(isset($_GET['catno']))
         {

        ?>

                                <table>
                                 <tr>
                                    <th>Sub-Category Name</th><th>Action</th>
                                 </tr>
                    
   <?php   
             $catno=$_GET['catno']; 
             $sql="SELECT cat_id,sub_cat FROM sub_category where cat_id=$catno;";
  $r=$conn->query($sql);

   if($r->num_rows > 0)
 {
    
    while($row = $r->fetch_assoc())
    {
         $sub_cat=$row['sub_cat'];

         

        ?>





 <tr><td><a href="?catno=<?php echo $cat_id; ?>"> <?php echo $sub_cat;?> </a></td><td><input type="submit" name="del_cat" value="Delete"> <input type="submit" name="edit_cat" value="Edit"></td>
   </tr>
                                 
                                                        
<?php
    }
}
?>

</table>

<?php
}
else
{
    echo "No Category Selected";
}
?>

                                
                            
    	 	            	</div>
    	 	            	<input style="margin-top: 8px;" type="text" name="add-cat">
    	 	            	<input type="submit" name="add-cat" value="Add">
    	 	            </div>
    	 	            <div class="icon-pic">
    	 	            		<h2 style="text-align: center;">Category Images of<span style="color: blue;font-weight: bold;"> Fashion </span> </h2>
    	 	            	  <table>
    	 	            	  	<tr>
    	 	            	  		<th>Icon</th> <th>Picture</th>
    	 	            	  	</tr>
    	 	            	  	<tr><td>NO icon</td><td>NO Picture</td></tr>
    	 	            	  </table>
    	 	            </div>
                    



    	 </div>
    	
        <?php
  include("inc/footer.php");
        ?>