<?php
	include ('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
</head>
<body>
	<form method="post">
		<table border="1">
			<tr>
				<td colspan="2" style="font-weight: bold;">Thông tin đăng nhập</td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="acc"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" minlength="6" name="pass"></td>
			</tr>
			<tr>
				<td>Repassword</td>
				<td><input type="password" minlength="6" name="repass"></td>
			</tr>
			<tr>
				<td colspan="2" style="font-weight: bold;">Thông tin giáo viên</td>
			</tr>
			<tr>
				<td>Teacher</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="mail"></td>
			</tr>
			<tr>
				<td>Giới tính</td>
				<td><input type="radio" name="gt" value="Nam">Nam
					<input type="radio" name="gt" value="Nữ">Nữ
				</td>
			</tr>
			<tr>
				<td>Ngày sinh</td>
				<td><input type="date" name="date"></td>
			</tr>
			<tr>
				<td>Quê quán</td>
				<td>
					<select name="city">
						<option>Chọn tỉnh</option>
						<option>Hà Nội</option>
						<option>Vĩnh Long</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="dangky" value="Regist"></td>
			</tr>
		</table>
	</form>
	<?php
		if(isset($_POST['dangky'])){
			$acc = $_POST['acc'];
			$sql3 = "select * from account
					where Username = '$acc'";
			$tt=mysqli_query($conn,$sql3);
			$num=mysqli_fetch_array($tt);
		if($num['Username'] != $acc){
			$pass = $_POST['pass'];
			$repass = $_POST['repass'];
			$name = $_POST['name'];
			$mail = $_POST['mail'];
			$gt = $_POST['gt'];
			$date = $_POST['date'];
			$city = $_POST['city'];
			if ($pass == $repass){
				$sql1 = "insert into thongtin(Teacher, Email, Gioitinh, Ngaysinh, Quequan)
						values('$name', '$mail', '$gt', '$date', '$city')";
				$thucthi1 = mysqli_query($conn, $sql1);
					if(!$thucthi1){
					echo "<br><script> alert('Không thể lưu dữ liệu')</script>";
				}
					else{
					echo "<br><script> alert('Lưu thành công')</script>";
				}
				$sql2 = "insert into account(Username, Password)
						 values('$acc', '$pass')";
				$thucthi2 = mysqli_query($conn, $sql2);
				if ($thucthi2){
					/*header('location:login.php');*/
				}
			}
		    else {
				echo "<script> alert('Vui lòng nhập đúng mật khẩu!!!!!!!!!!!!!!!!!!!!!!!!!!!!')</script>";
			}
		}
		else{
			echo "Tên tài khoản đã được sử dụng!";
		}
		echo $num['Username'];
	}

	?>
</body>
</html>