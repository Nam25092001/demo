<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sửa thông tin sinh viên</title>
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
			width: 300px;
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
	<h2>Sửa thông tin sinh viên</h2>
		<?php
		$_Masinhvien = $_GET["Masinhvien"];
		$conn = mysqli_connect("localhost","root","","test");
	if(!$conn){
		die("Kết nối thất bại".mysql_connect_error());
	}

		$query="SELECT * from sinhvien where Masinhvien ='".$_Masinhvien."'";
			$result= mysqli_query($conn, $query);

			if(mysqli_num_rows($result)){
		
				while ($row= mysqli_fetch_assoc($result)) {
				$Tensinhvien = $row["Tensinhvien"];
				$Quequan = $row["Quequan"];
			}
		}
		?>
	<form method="post">
		
		<table>	
					<tr>
				<td>Tên sinh viên</td>
				<td><input type="text" name="Tensinhvien" value=" <?php echo $Tensinhvien ?>"></td>
			</tr>	


			<tr>
				<td>Quê quán</td>
				<td><input type="text" name="Quequan" value=" <?php echo $Quequan ?>" ></td>
			</tr>	

				<tr>
					<td><input type="submit" name="btnSua" value="Sửa"></td>
				</tr>

		</table>

	</form>

		<?php 
		if($_SERVER['REQUEST_METHOD']=='POST'&& $_POST["btnSua"]){
				Edit();
			}

		function Edit(){
			$_Masinhvien = $_GET["Masinhvien"];
			$_Tensinhvien = $_POST['Tensinhvien'];
			$_Quequan = $_POST['Quequan'];

			$conn = mysqli_connect("localhost","root","","test");
			if(!$conn)
			{
				die("Kết nối thất bại".mysql_connect_error());
			}

			$query = "UPDATE sinhvien set Tensinhvien='".$_Tensinhvien."',Quequan = '".$_Quequan."' WHERE Masinhvien='".$_Masinhvien."'";
			$result= mysqli_query($conn,$query);
			if($result == true){
				echo "Cập nhật dữ liệu thành công";
			}
			else{
				echo "Thất bại";
			}
			mysqli_close($conn);
		}

		?>
	<a href="/test14.10/index.php">Về trang chủ</a>
		</div>
</body>
</html>