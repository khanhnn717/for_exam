<?php 
include('connect.php');
$id=$_GET['id'];
$sql = "delete from phancong where ID='$id'";
$tt = mysqli_query($conn,$sql); echo $sql;
if($tt){
	echo "Được";
}
else {
	echo "éo được";
}
header('location:hienbang.php');
?>