<?php
	include ('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
	<form method="post">
		<table border="1">
			<tr>
				<td>Username</td>
				<td><input type="text" name="acc"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="dangnhap" value="Login"></td>
			</tr>
		</table>
	</form>
	<?php
		if(isset($_POST['dangnhap'])){
			$acc = $_POST['acc'];
			$pass = $_POST['pass'];
			$sql = "select Username,Password from quantrivien where Username='$'acc' and Password='$pass'";
			$tt = mysqli_query($conn,$sql);
			$num=mysqli_num_rows($tt);
			if($num !=0){
				header('location:hienbang.php');
			}
			else {
				$sql1 = "select Username,Password from account where Username='$acc' and Password='$pass'";
				$tt1 = mysqli_query($conn,$sql1);
				$num1=mysqli_num_rows($tt1);
				if($num1 !=0){
				header('location:dangkytkb.php');}
				else echo"ko ton tai";

			}
			/*$sql1 = "select * from quanttrivien
					where Username = '$acc'
						and Password = '$pass'";
			$tt = mysqli_query($conn,$sql1);
			$num1 = mysqli_num_rows($tt);
			if ($num1!=0){
				$_SESSION['Username'] = $acc;
				$_SESSION['Password'] = $pass;
				header('location:hienbang.php');
			}
			else{
				echo "<script> alert('Wrong Username or Password')</script>";
			}*/
		}
	?>
</body>
</html>