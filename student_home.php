<?php
include 'include/HelperController.php';
$helper=new HelperController;
$helper->checkAuthLogin();
$helper->checkIsTeacher();


$data=$helper->fetchResult();
$is_result=false;

if($data){
	$is_result=true;
	$result_data=$helper->fetch_result_data($data['id']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Result</title>
	<?php include 'css.php'; ?>
</head>
<body>
<div class="container">
	<div class="row">
	<div class="col-lg-12">
		<a href="logout.php" class="btn btn-success">Logout</a>
	</div>
	</div>
	<div class="row">
	<?php if($is_result) { ?>
		<div class="col-lg-12">
			<table class="table">
				<tr><th colspan="3">Result</th></tr>
				<tr>
					<th>Subject</th>
					<th>Marks</th>
					<th>Marks Obtained</th>
				</tr>
				<?php foreach($result_data as $result){ ?>
					<tr>
						<td>
							<?php echo $result['subject_name']; ?>
						</td>
						<td>
							100
						</td>
						<td>
							<?php echo $result['marks']; ?>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	<?php } else { ?>
		<div class="col-lg-12">
			<h2>Result Not Found!</h2>
		</div>
	<?php }	?>
</div>
</div>
</body>
</html>	