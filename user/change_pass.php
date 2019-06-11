<?php
include('plugins/connect.php');
  session_start();
  if (!isset($_SESSION['user'])) {
       $_SESSION['err']=3;
      header("Location:../login/");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		CHange Password
	</title>

	<style type="text/css">
		.edit_pass input{
                 margin: 10px;
    border-radius: 5px;
    border: 1px solid #7198ff;
    padding: 7px;
		}
		.edit_pass{
			padding: 15px;
    display: inline-block;
    background-color: #ffe2b0;
    border: 3px solid #0b5601;
    border-radius: 10px;
		}
	</style>
</head>
<body>
      
    <div class="edit_pass">
       <form action="change_pass.php" method="post">
      	   Enter Old Password: <input type="text" name="pass"> <br>
      	   Enter New Password: <input type="text" name="new_pass"> <br>
      	   Re-Enter Password: <input type="text" name="re_pass"> <br>
      	   <input style="margin-left: 130px;" type="submit" value="Change Password" name="edit_pass">

      </form>	

    </div>
      
</body>
</html>

<?php
   if(isset($_POST['edit_pass']))
   {
          $old=$_POST['pass'];
          $new=$_POST['new_pass'];
          $re_pass=$_POST['re_pass'];
          $user_id=$_SESSION['user_id'];

         $sql="SELECT PASS FROM users where user_id='$user_id' ;";
          $r= $conn -> query($sql);
            if($row=$r->fetch_assoc())
            {
              $pass=$row['PASS'];
            }

          if($new!=$re_pass)
            echo "Password Not Matched";
          elseif($old==$pass)
          {
            $sql="UPDATE users set PASS='$new' where user_id='$user_id' and PASS='$old' ;";
          $r= $conn -> query($sql);
          

          if($r->num_rows == 1)
          {
            echo "Successfully CHanged!";
          }
          else
          {
            echo "NEW Password Mismatch";
          }
          }
          else
          {
            echo "Old Password Not Matched";
          }
          
   }

?>