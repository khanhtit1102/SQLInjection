<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<style>
	main{
		margin: auto
	}
</style>
<body>
	<?php 
		session_start();
		if (isset($_SESSION['login'])) {
				header('Location: index.php');
		}
	// Disable warning Message
		// error_reporting(E_ERROR | E_PARSE);

	// Submit button

		if(isset($_POST["submit"])){
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		// $username = addslashes($username);
		// $password = addslashes($password);
		
		require_once("connection.php");

		echo $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password' ";
		$query = mysqli_query($conn,$sql);
		$num_rows = mysqli_num_rows($query);

		if ($num_rows==0) {
			echo "<br>Tên đăng nhập hoặc mật khẩu không đúng !";
		}
		else{
			$_SESSION["login"] = "true";
			echo "<script type='text/javascript'>alert('Logged In');</script>";
			echo "<br>Redirect in 10 second!";
			echo "<meta http-equiv='refresh' content='10; url=http://localhost/SQLInjection/Attack' />";
			
		}
	}
	 ?>
	 <main>
	 	<h1>Login</h1>
		<form action="" method="post">
			<label for="">Username: </label>
			<input type="text" name="username" required=""><br><br>
			<label for="">Password: </label>
			<input type="password" name="password" required=""><br><br>
			<button type="submit" name="submit">Submit</button>
		</form>
	 </main>
</body>
</html>