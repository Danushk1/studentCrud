<?php
	include "config.php";
?>
<html>
	<head>
		<title>student crud Application</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
		
	</head>
	<body>
	<div class="container">
		<h3 class='text-center'>student crud Application</h3><hr>
		<div class='row'>
			<div class="col-md-5">
				<form id='frm'>
				  <div class="form-group">
					<label>User Name</label>
					<input type="text" class="form-control" name="name" id='name' required placeholder="Enter User Name">
				  </div>
				  <div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id='email' required placeholder="Enter Email">
				  </div>
				  <div class="form-group">
					<label>Mobile No</label>
					<input type="text" class="form-control"  name="mobile" id='mobile' required placeholder="Enter Mobile Number">
				  </div>
				  
				  <input type="hidden" class="form-control" name="uid" id='uid' required value='0' placeholder="">
				  
				  <button type="submit" name="submit" id="but" class="btn btn-success">Add User</button>
				  <button type="button" id="clear" class="btn btn-warning">Clear</button>
				</form> 
			</div>
			<div class="col-md-7">
				<table class="table table-bordered" id='table'>
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql="select * from stu";
							$res=$con->query($sql);
							if($res->num_rows>0)
							{
								while($row=$res->fetch_assoc())
								{	
									echo"<tr class='{$row["id"]}'>
										<td>{$row["name"]}</td>
										<td>{$row["name"]}</td>
										<td>{$row["phone"]}</td>
										<td><a href='#' class='btn btn-primary edit' uid='{$row["id"]}'>Edit</a></td>
										<td><a href='#' class='btn btn-danger del' uid='{$row["id"]}'>Delete</a></td>					
									</tr>";
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

		
		<script src="script.js"></script>

	</body>
</html>