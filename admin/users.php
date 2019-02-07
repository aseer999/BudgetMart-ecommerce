<?php
include("inc/header.php");

?>


<div class="section">
  <?php

      if(isset($_SESSION['ask']) && $_SESSION['ask']==1)
      {
      	$id = $_SESSION['id'];
    	$R=$_SESSION['R'];
    	$attr=$_SESSION['attr'];
    	$page=$_SESSION['page'];
      	include("inc/confirm_del.php");
      }

     if(isset($_SESSION['success']))
     {
     	include("inc/success_msg.php");
     	unset($_SESSION['success']);
     }
    
    ?>



	<input style="margin: 20px;" type="submit" name="add_new" value="Add New User">
	<div class="data-view">
		<table>
		<tr>
			<th>User ID</th>
			<th>Username</th>
			<th>Password</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Birth Date</th>
			<th>Registration Date</th>
			<th>Shop ID</th>
			<th>Action</th>
			
		</tr>

<?php
  $sql="SELECT user_id,username,PASS,f_name,l_name,email,gender,address,phone,birth_date,reg_date,shop_id FROM users";
  $r=$conn->query($sql);
  while ($row=$r->fetch_assoc()) {
  	 $user_id=$row['user_id'];
  	 $username=$row['username'];
  	 $pass=$row['PASS'];
  	 $f_name=$row['f_name'];
  	 $l_name=$row['l_name'];
  	 $email=$row['email'];
  	 $gender=$row['gender'];
  	 $address=$row['address'];
  	 $phone=$row['phone'];
  	 $birth_date=$row['birth_date'];
  	 $reg_date=$row['reg_date'];
  	 $shop_id=$row['shop_id'];


 ?>  

<tr>
			<td><a href="#"><?php echo $user_id; ?></a> </td>
			<td><?php echo $username; ?></td>
			<td><?php echo $pass; ?></td>
			<td><?php echo $f_name; ?></td>
			<td><?php echo $l_name; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $gender; ?></td>
			<td><?php echo $address; ?></td>
			<td><?php echo $phone; ?></td>
			<td><?php echo $birth_date; ?></td>
			<td><?php echo $reg_date; ?></td>
			<td><?php echo $shop_id; ?></td>
			<td><a href="process.php?ask=1&R=users&id=<?php echo $user_id; ?>&attr=p_id&page=users">
				<img width="18%" style="margin-left: 10px;" src="images/del.png">
			</a> <a href="#2">
				<img width="18%" style="margin-left: 20px;" src="images/edit.png">
			</a>
				</td>



 <?php
  }
?>

		
			
		</tr>





	</table>
	</div>
	
</div>

<?php
include("inc/footer.php");
?>