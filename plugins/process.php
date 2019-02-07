<?php
  include("connect.php");
session_start();

//Register Processing START ---------------- >>>>
//Register Processing START ---------------- >>>>
//Register Processing START ---------------- >>>>

if(isset($_POST['reg']))
{
  if($_POST['pass']==$_POST['re_pass'])
  {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $user=$_POST['user'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $b_date=$_POST['b_date'];
    $gender=$_POST['gender'];
       $address=$_POST['address'];
       $phone=$_POST['phone'];
     $reg_date=date('Y-m-d');
                                             
  
              $sql="Select user_id from users order by user_id desc limit 1";
              $r=$conn->query($sql);
              while($row = $r->fetch_assoc())
              {
                $data_user=$row['user_id']+1;
              }
   $shop_id="Shop_$data_user";
  
  
 // $target_dir = "../user/uploads/";
    $ext= explode(".",$_FILES['pic']['name']);
    $c=count($ext);
    $ext=$ext[$c-1];
    $image_name=md5($user.$shop_id);
    $image=$image_name.".".$ext;

  // echo $target_file =basename($_FILES["pic"]["name"]);
   $target_file = $image;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image. <br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists. <br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["pic"]["size"] > 500000) {
    echo "Sorry, your file is too large. <br>";
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
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], "../user/uploads/$target_file")) {
     //   echo "The file ". basename( $_FILES["pic"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file. <br>";
    }
}
      
    
    
  




  $sql="INSERT INTO users(username,PASS,email,gender,phone,birth_date,f_name,l_name,address,reg_date,shop_id,picture)
                values('$user','$pass','$email','$gender',$phone,'$b_date','$fname','$lname','$address','$reg_date','$shop_id','$target_file');";  
           $r = $conn->query($sql);
            if($r)
            {
               // echo "<span class='msg' >Successful</span>";
                 $_SESSION['err']=2;
             //    exit();
              header("Location:../login/");
            
        }
        else
        {
            echo "<span class='msg' >connection error</span>".$sql;
        }
  }
  else
  {
    echo "<span class='msg' >Password Mismatch</span>";
  }
     
        }


  //Register Processing END ---------------- >>>>
  //Register Processing END ---------------- >>>>
  //Register Processing END ---------------- >>>>




// Login Processing START ------------------- >>>>
// Login Processing START ------------------- >>>>
// Login Processing START ------------------- >>>>

  if(isset($_POST['login']))
  {
   // echo "login isseted";
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $sql="SELECT username,PASS FROM users WHERE username='$user' AND PASS='$pass';";
    $sql1="SELECT username,PASS FROM admin WHERE username='$user' AND PASS='$pass';";
 
    $r=$conn->query($sql);
    $r1=$conn->query($sql1);

     if($r->num_rows > 0)
    {
     //    echo "Successfully logged";
   $_SESSION['user']=$user;
    
                 //taking Id in session variable--->
      echo  $sql2="SELECT user_id,shop_id FROM users WHERE username='$user' AND PASS='$pass';";
              $r2=$conn->query($sql2);
              while($row = $r2->fetch_assoc())
              {
                $user_id=$row['user_id'];
                 $shop_id=$row['shop_id'];
                 $_SESSION['user_id']=$user_id;
                 $_SESSION['shop_id']=$shop_id;
              }
        

            //taking Id in session variable--->

     header("Location:../user/");
    }
    elseif($r1->num_rows > 0)
	{
      $_SESSION['admin']=$user;
		header("Location:../admin/");
	}
	else
    {
       $_SESSION['err']=1;
       header("Location:../login/");
    }
  }
// Login Processing END ---------------- >>>> 
// Login Processing END ---------------- >>>> 
// Login Processing END ---------------- >>>> 





  //logout Processing START -------------- >>>>
  //logout Processing START -------------- >>>>
  //logout Processing START -------------- >>>>
  

  if(isset($_GET['logout']))
  {
    // remove all session variables
session_unset(); 

// destroy the session 
session_destroy();

header("Location:../");
  }

  //logout Processing END --------------- >>>>
  //logout Processing END --------------- >>>>
  //logout Processing END --------------- >>>>
  


?>