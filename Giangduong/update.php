<?php 
	$id=$_GET['id'];
	include("connect.php");
	$sql="Select *from phancong where ID='$id'";
	$tt=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($tt);
 ?>
	<form method="get" enctype="multipart/from-data">
		<table border="1">
			<tr>
				<th colspan="2">Cập nhật thời khoá biểu</th>
			</tr>
			<tr>
				<td>ID: </td>
				<td><input type="text" name="id" value="<?php echo $row['ID']; ?>"></td>
			</tr>
			<tr>
				<td>Giảng đường</td>
				<td>
					<select name="gd">
						<option value="500" <?php if($row['Giangduong']==500 )echo "selected"; ?>>500</option>
						<option value="501" <?php if($row['Giangduong']==501 )echo "selected"; ?>>501</option>
						<option value="502" <?php if($row['Giangduong']==502 ) echo "selected"; ?>>502</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tên giảng viên</td>
				<td><input type="text" name="name" value="<?php echo $row['Teacher']; ?>"></td>
			</tr>
			<tr>
				<td>Môn dạy</td>
				<td>
					<select name="sub">
						<option value="PHP" <?php if($row['Subject']=='PHP' )echo "selected"; ?>>PHP</option>
						<option value="SQL" <?php if($row['Subject']=='SQL' )echo "selected"; ?>>SQL</option>
						<option value="Linux" <?php if($row['Subject']=='Linux' )echo "selected"; ?>>Linux</option>
					</select>
				</td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" name="ok" value="Cập nhật"></th>
			</tr>
		</table>
	</form>
	<?php
		/*$a="image/".$_FILES(["image"]["name"]);*/

		if(isset($_GET['ok'])){
			$id=$_GET['id'];
			$gd = $_GET['gd'];
			$name = $_GET['name'];
			$sub = $_GET['sub'];
			$sql1 = "update phancong set Giangduong ='$gd'
			,Teacher ='$name',Subject='$sub'
			where ID ='$id'
			";
			$thucthi = mysqli_query($conn, $sql1);
			if($thucthi){
				echo "<script>alert('Đăng ký thành công')</script>";
				header('location:hienbang.php');
			}
			else{
				echo "<script>alert('Đăng ký thất bại')</script>";
			}
		}
	?>