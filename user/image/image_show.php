<?php
include('connect.php');
$sql="SELECT pic FROM product";
$r= $conn -> query($sql);
   if($r->num_rows > 0)
 {
?>
    <table>
	    <tr> 
          <th> PICTURE </th>
		</tr>	
<?php    
    while($row = $r->fetch_assoc())
     {
		 
		 $pic = $row['pic'];
?>

        <tr> 
          <th> <img style="width:27%;" src="uploads/<?php echo $pic; ?>" > </th>
		</tr>    
<?php 
}
}
?>

  </table>

