<?php
include("inc/header.php");
?>
<div class="main-section">
	 <?php
   $sql="SELECT username,f_name,l_name,email,gender,address,phone,birth_date,picture
FROM users where user_id=$user_id";
    $r=$conn->query($sql);
    while ($row=$r -> fetch_assoc()) {
    	$username=$row['username'];
    	$f_name=$row['f_name'];
    	$l_name=$row['l_name'];
    	$email=$row['email'];
    	$gender=$row['gender'];
    	$address=$row['address'];
    	$phone=$row['phone'];
    	$birth_date=$row['birth_date'];
    	$picture=$row['picture'];

    }
  ?>
   <h2 style="    text-align: center;
    font-family: cursive;
    font-size: 40px;
    color: #162448;">Profile Information</h2>
          
       <div class="profile_view">
           <img width="100%" src="uploads/<?php echo $picture; ?>">
       </div>
      <table class="profile_info" style="border-spacing: 5px;text-align: center;font-size: 20px;font-family: cursive;">
 


            <tr><td>  Name : </td> <td>  <?php echo "$f_name $l_name"; ?> </td>  </tr>
            <tr><td>  Email: </td> <td>  <?php echo $email; ?> </td>  </tr>
            <tr><td>  Mobile: </td> <td>  <?php echo $phone; ?></td>  </tr>
            <tr><td>  Address: </td> <td>  <?php echo $address; ?> </td>  </tr>
           <tr><td>  Username: </td> <td>  <?php echo $username; ?></td>  </tr>
           <tr><td>  Gender: </td> <td>  <?php echo $gender; ?></td>  </tr>
            <tr><td>  Birth Date: </td> <td>  <?php echo $birth_date; ?></td>  </tr>
            
      </table>
              



</div>
<?php
include("inc/footer.php");
?>