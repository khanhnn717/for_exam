<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form>
		<table border="1">
			<tr>
				<th colspan="5">Thời khoá biểu</th>
			</tr>
			<tr>
				<td>ID</td>
				<td>Giảng đường</td>
				<td>Teacher</td>
				<td>Môn dạy</td>
				<td>Thao tác</td>
			</tr>
				<?php	
				$id=1;
					include ('connect.php');
					$sql="select *from phancong";
					$tt=mysqli_query($conn,$sql);
					$num=mysqli_num_rows($tt);
					if($num >0){
						while($row = mysqli_fetch_array($tt)){
							echo "<tr>";
							echo "<td>".$row['ID']." </td>";
							echo "<td>".$row['Giangduong']."</td>";
							echo "<td>".$row['Teacher']."</td>";
							echo "<td> ".$row['Subject']."</td>";
							echo"<td><a href='dangkytkb.php'>Thêm</a>||
								<a href='delete.php?id=".$row['ID']."'>Xoá</a>||
								<a href='update.php?id=".$row['ID']."'>Sửa</a>
							</td>";
							$id++;
							echo "</tr>";
						}
					}
					else{
						header('location:dangkytkb.php');
					}
				?>
		</table>
		<a href="dangkytkb.php" style="text-decoration: none;">Thêm data vào bảng</a>
	</form>
</body>
</html>