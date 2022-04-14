<?php
session_start();
	include ("config.php");
	$pid=$_GET['pid'];
	if($pid==1)
	{
		$name=$_POST['name'];
		$_SESSION['name']=$name;
		$_SESSION['flag']='true';

	    header('location:index.php');
			

	}


?>