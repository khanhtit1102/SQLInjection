<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View Product</title>
</head>
<body>
	<?php 
		require_once("connection.php");
		if (isset($_GET["id"])) {
			$id = $_GET['id'];
			// $id = intval($_GET['id']);
			echo $sql = "SELECT * FROM products WHERE id = $id";
			$query = mysqli_query($conn,$sql);
		}

	 ?>

	<?php while ( $data = mysqli_fetch_array($query) ) { ?>
	<p>ID: <?php echo $data["id"]; ?></p>
	<p>Title: <?php echo $data["title"]; ?></p>
	<p>Price: $<?php echo $data["price"]; ?></p>
	<p>Description: <?php echo $data["description"]; ?></p>
	<?php } ?>
</body>
</html>