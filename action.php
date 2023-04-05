<?php 
	include "config.php";
	$uid=$_POST["uid"];
	$name=mysqli_real_escape_string($con,$_POST["name"]);
	$email=mysqli_real_escape_string($con,$_POST["email"]);
	$mobile=mysqli_real_escape_string($con,$_POST["mobile"]);
	if($uid=="0"){
		$sql="insert into stu (name,email,phone) values ('{$name}','{$email}','{$mobile}')";
		if($con->query($sql)){
			$uid=$con->insert_id;
			echo"<tr class='{$uid}'>
				<td>{$name}</td>
				<td>{$email}</td>
				<td>{$mobile}</td>
				<td><a href='#' class='btn btn-primary edit' id='{$uid}'>Edit</a></td>
				<td><a href='#' class='btn btn-danger del' id='{$uid}'>Delete</a></td>					
			</tr>";
			
		}
	}else{
		$sql="update stu set name='{$name}',email='{$email}',phone='{$mobile}' where id='{$uid}'";
		if($con->query($sql)){
			echo"
				<td>{$name}</td>
				<td>{$email}</td>
				<td>{$mobile}</td>
				<td><a href='#' class='btn btn-primary edit' id='{$uid}'>Edit</a></td>
				<td><a href='#' class='btn btn-danger del' id='{$uid}'>Delete</a></td>					
			";
		}
	}
?>