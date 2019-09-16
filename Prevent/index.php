<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SQL INJECTION</title>
</head>
<style>
	table,th,td{
		margin: auto;
		border: 1px solid black;
	}
</style>
<body>
	<?php 
		error_reporting(E_ERROR | E_PARSE);
		session_start(); 
		$login_status = $_SESSION['login'];
		if ($login_status == false) {
		// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
			header('Location: login.php');
		}else {
			if (isset($_GET["logout"])) {
				session_destroy();
				header('Location: index.php');
			}
		}
		require_once("connection.php");
		$sql = "SELECT * FROM products";
		if (isset($_GET['keyword'])) {
			$keyword = $_GET['keyword'];
			$keyword = addslashes($_GET['keyword']);
			echo $sql = "SELECT * FROM products WHERE title LIKE '%$keyword%'";
		}
		$query = mysqli_query($conn,$sql);
	?>
	<form action="" method="get">
		<input type="text" name="keyword" placeholder="Your keyword">
		<button type="submit">Search</button>
	</form>
	<br><a href="?logout=true"><button>Logout</button></a>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Selling Price</th>
				<th>Description</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php while ( $data = mysqli_fetch_array($query) ) { ?>
			<tr>
				<td><?php echo $data["id"]; ?></td>
				<td><?php echo $data["title"]; ?></td>
				<td><?php echo $data["price"]; ?></td>
				<td><?php echo $data["description"]; ?></td>
				<td><a href="<?php echo "view.php?id=".$data["id"] ?>">View</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>