<?php
	$_Masinhvien = $_GET["Masinhvien"];
	$conn = mysqli_connect("localhost","root","","test");
	if(!$conn){
		die("Kết nối thất bại".mysql_connect_error());
	}

	$query = "DELETE FROM sinhvien where Masinhvien ='".$_Masinhvien."'";
			$result= mysqli_query($conn,$query);
			if($result == true){
				echo "Xóa thành công";
			}
			else{
				echo "Thất bại";
			}
			mysqli_close($conn);
?>
	<br>
	<a href="/test14.10/index.php">Về trang chủ</a>
