<?php
	include ('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Phân công</title>
</head>
<body>
	<form method="get">
		<table border="1">
			<tr>
				<th colspan="2">Đăng ký thời khoá biểu</th>
			</tr>
			<tr>
				<td>Giảng đường</td>
				<td>
					<select name="gd">
						<option>500</option>
						<option>501</option>
						<option>502</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tên giảng viên</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Môn dạy</td>
				<td>
					<select name="sub">
						<option>PHP</option>
						<option>SQL</option>
						<option>Linux</option>
					</select>
				</td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" name="ok" value="Đăng ký"></th>
			</tr>
		</table>
	</form>
	<?php 
		if(isset($_GET['ok'])){
			$gd = $_GET['gd'];
			$name = $_GET['name'];
			$sub = $_GET['sub'];
			$sql = "insert into phancong(Giangduong, Teacher, Subject)
					values('$gd', '$name', '$sub')";
			$thucthi = mysqli_query($conn, $sql);
			if($thucthi){
				echo "<script>alert('Đăng ký thành công')</script>";
				header('location:hienbang.php');
			}
			else{
				echo "<script>alert('Đăng ký thất bại')</script>";
			}
		}
	?>
	<a href="hienbang.php" style="text-decoration: none;">Quay lại trang dữ liệu</a>
</body>
</html>