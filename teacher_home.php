<?php
include 'include/HelperController.php';
$helper=new HelperController;
$helper->checkAuthLogin();
$helper->checkIsStudent();
$data=$helper->fetchStudents();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teacher Home</title>
	<?php include 'css.php'; ?>
</head>
<body>
<div class="container">
	<div class="row">
   		<?php if(isset($_REQUEST['error'])) { ?>
   		<div class="col-lg-12">
   			<span class="alert alert-danger" style="display: block;">
   				<?php echo $_REQUEST['error']; ?>	
			</span>
   		</div>
	   	<?php } ?>
	 </div>
	 <div class="row">
   		<?php if(isset($_REQUEST['success'])) { ?>
   		<div class="col-lg-12">
   			<span class="alert alert-success" style="display: block;">
   				<?php echo $_REQUEST['success']; ?>	
			</span>
   		</div>
	   	<?php } ?>
	 </div>
	<div class="row">
		<a href="add_student.php" class="btn btn-success" style="margin:10px;">Add Student</a>
		<a href="logout.php" class="btn btn-success" style="margin:10px;">Logout</a>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div>
			<table class="table table-bordered">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Action</th>												
				</tr>
				<?php
				  foreach($data as $d) {
				 ?>
				 <tr>
				 	<td><?php echo $d['id']; ?></td>
				 	<td><?php echo $d['name']; ?></td>
				 	<td><?php echo $d['email']; ?></td>	 	
				 	<td><a class="btn btn-info" href="edit_result.php?id=<?php echo $d['id']; ?>">Edit Result</a></td>	 	
				 </tr>
				 <?php
				  } 
				?>
			</table>
			</div>
		</div>
	</div>
</div>
</body>
</html>