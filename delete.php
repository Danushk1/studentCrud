<?php 
	include "config.php";
	$uid=$_POST["id"];
	$sql="delete from stu where id='{$uid}'";
	if($con->query($sql)){
		echo true;
	}else{
		echo false;
	}
?>