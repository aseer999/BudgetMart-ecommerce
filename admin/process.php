<?php
session_start();
include("../plugins/connect.php");


if(isset($_GET['ask']) && $_GET['ask']==1)
{
	$_SESSION['ask']=1;
    $_SESSION['R']=$_GET['R'];
    $_SESSION['id']=$_GET['id'];
    $_SESSION['attr']=$_GET['attr'];
    $page=$_GET['page'];
    $_SESSION['page']=$page;
    header("Location:$page.php");
}

if(isset($_GET['ask']) && $_GET['ask']==0)
{
	 unset($_SESSION['ask']);
	 $page=$_GET['page'];
	 header("Location:$page.php");
}

if(isset($_GET['del']))
{
	$R=$_GET['R'];
	$id=$_GET['id'];
	$attr=$_GET['attr'];
	$page=$_GET['page'];
	//echo "Ready to delete From $R where $attr=$id";
	$sql="DELETE FROM $R WHERE $attr=$id";
	$r=$conn->query($sql);
	if($r){
	$_SESSION['success']=1;
	  unset($_SESSION['R']);
	  unset($_SESSION['id']);
	  unset($_SESSION['attr']);
	  unset($_SESSION['page']);
	  unset($_SESSION['ask']);
     header("Location:$page.php");	
	}
	else
	echo "Error in DELETION";
	
}
 

?>