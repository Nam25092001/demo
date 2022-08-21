<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thêm sinh viên</title>
	<style type="text/css">
			input{
			border-radius: 5px;
			margin-top: 10px;
		}
		body{
			background: linear-gradient(120deg,#2980b9, #8e44ab);
		}
		.mid{
			margin: 200px auto 0px auto;
			width: 350px;
			background:white ;
			border-radius:10px;
		}
			h2{
				text-align: center;
			}
	</style>
</head>
<body>
	<div class="mid">
		<h2>Thêm mới thông tin sinh viên</h2>
		<?php
	$conn = mysqli_connect("localhost","root","","test");
	if(!$conn){
		die("Kết nối thất bại".mysql_connect_error());
	}
	//echo "kết nối thành công";
	?>

	<form method="post">
		<table>
			<tr>
				<td>Mã sinh vien</td>
				<td><input required type="text" name="txtMasinhvien"></td>
			</tr>	

				<tr>
				<td>Tên sinh vien</td>
				<td><input type="text" name="txtTensinhvien"></td>
			</tr>	

			<tr>
				<td>Quê quán</td>
				<td><input type="text" name="txtQuequan"></td>
			</tr>	

				<tr>
					<td><input  type="submit" name="btnGhi" value="Thêm"></td>
				</tr>

		</table>
	</form>
	<a href="/test14.10/index.php">Về trang chủ</a>

		<?php

			if($_SERVER['REQUEST_METHOD']=='POST'&& $_POST["btnGhi"]){
				CheckData();
			}
			function CheckData()
			{
				$Masinhvien =$_POST['txtMasinhvien'];
				$conn = mysqli_connect("localhost","root","","test");
				if($conn == true){
				$query = "SELECT * FROM sinhvien where Masinhvien='".$Masinhvien."'";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result)>0){
				echo "Mã sinh viên: " .$Masinhvien." đã tồn tại";
				exit();
			}
			else{
			InsertData();
		}
			}
			else	{
			echo "Connect error:" .mysqli_connect_error();
		}
			}

		function InsertData(){
			$_Masinhvien = $_POST['txtMasinhvien'];
			$_Tensinhvien = $_POST['txtTensinhvien'];
			$_Quequan = $_POST['txtQuequan'];

			$conn = mysqli_connect("localhost","root","","test");
			if(!$conn)
			{
				die("Kết nối thất bại".mysql_connect_error());
			}

			$query = "INSERT INTO sinhvien( Masinhvien,Tensinhvien, Quequan) values('".$_Masinhvien."','".$_Tensinhvien."','".$_Quequan."')";
			$result= mysqli_query($conn,$query);
			if($result == true){
				echo "Ghi thành công";
			}
			else{
				echo "Thất bại";
			}
			mysqli_close($conn);
		}
		?>
	</div>
</body>
</html>