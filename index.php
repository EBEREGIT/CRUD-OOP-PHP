<?php 

include "action.php";

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CRUD OOP PROJECT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body class="container">
	<div class="jumbotron">
		<h1>Medicine Stock</h1>
		
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">Enter Medicine Details</div>
				</div>
				<div class="panel-body">

				<?php 

					if (isset($_GET["update"])) {
						// if (isset($_GET["id"])) {
						// 	$id = $_GET["id"];
						// }

						$id = $_GET["id"] ?? null;
						$where = array("id" => $id,);
						$row = $obj -> select_record("medicine", $where);
						?>

						<form action="action.php" method="post">
						<table class="table table-hover">
							<tr>
								<td>
									<input type="hidden" name="id" value="<?php echo $id;?>"
								</td>
							</tr>
							<tr>
								<td>Medicine Name</td>
								<td>
									<input class="form-control" type="text" name="name" value="<?php echo $row['m_name'];?>"placeholder="Enter Medicine Name">
								</td>
							</tr>

							<tr>
								<td>Quantity</td>
								<td>
									<input class="form-control" type="text" name="qty" value="<?php echo $row['qty'];?>" placeholder="Enter Medicine Quantity">
								</td>
							</tr>

							<tr>
								<td colspan="2" align="center">
									<input class="btn btn-primary" type="submit" name="edit" value="Update">
								</td>
							</tr>
						</table>
					</form>

						<?php
					
					}else{
						?>

						<form action="action.php" method="post">
						<table class="table table-hover">
							<tr>
								<td>Medicine Name</td>
								<td>
									<input class="form-control" type="text" name="name"  placeholder="Enter Medicine Name">
								</td>
							</tr>

							<tr>
								<td>QuantityQuantity</td>
								<td>
									<input class="form-control" type="text" name="qty"  placeholder="Enter Medicine Quantity">
								</td>
							</tr>

							<tr>
								<td colspan="2" align="center">
									<input class="btn btn-primary" type="submit" name="submit" value="Store">
								</td>
							</tr>
						</table>
					</form>

						<?php
					}
					

				?>

					
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<table class="table table-bordered">
						<tr>
							<th>#</th>
							<th>Medicine Name</th>
							<th>Available Stock</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>

						<?php  
							$myrow = $obj->fetch_record("medicine");
							foreach ($myrow as $row) {
								?>
									<tr>
										<td><?php echo $row["id"]; ?></td>
										<td><?php echo $row["m_name"]; ?></td>
										<td><b><?php echo $row["qty"]; ?></b></td>
										<td><a href="index.php?update=1&id=<?php echo $row['id'];?>" class="btn btn-info">Edit</a></td>
										<td><a href="action.php?delete=1&id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
									</tr>
								<?php
							}
						?>

						
					</table>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		
	</div>
	<script type="text/javascript" href="jquery-3.1.1.min.js"></script>
	<script type="text/javascript" href="bootstrap.min.js"></script>
</body>
</html>
