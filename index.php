<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Danh sách sinh viên</title>
	<meta charset="utf-8">
	<style type="text/css">
		table {
		width: 480px;
		margin-left: 20px;
		border: 1px solid black;
		border-collapse: collapse; 
		}

	th, td{
		padding: 8px;
	}
		body{
			background: linear-gradient(120deg,#2980b9, #8e44ab);
		}
		.mid{
			margin: 200px auto 0px auto;
			width: 500px;
			background:white ;
			border-radius:10px;
		}
			h2{
				text-align: center;
			}
		  button  {
			margin-top: 20px;
			margin-left: 20px;
		}
			input{
				
				margin-left: 10px;
			}
	</style>
</head>

<body>
	<div class="mid">
		<form method="POST">
		<input type="text" name="txtSearch">
		<button name="btnSearch">Tìm kiếm</button>
	</form>
	<h2>Danh sách sinh viên</h2>
	<?php
	$conn = mysqli_connect("localhost","root","","test");
	if(!$conn){
		die("Kết nối thất bại".mysql_connect_error());
	}
	//echo "kết nối thành công";
	?>
	<table id="tblMain" border="1">
		<thead>
			<tr>
				<td>Mã sinh viên</td>
				<td>Tên sinh viên</td>
				<td>Quê quán</td>
				<td>Thao tác</td>
			</tr>
		</thead>

		<tbody>
			<?php
			$query="SELECT * from sinhvien";
			$result= mysqli_query($conn, $query);

			if(mysqli_num_rows($result)){
				while ($row= mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["Masinhvien"]."</td>";
					echo "<td>".$row["Tensinhvien"]."</td>";
					echo "<td>".$row["Quequan"]."</td>";
					echo "<td>".
					"<a href='/test14.10/Update.php?Masinhvien=".$row["Masinhvien"]."'>Sửa</a>".
					"<a href='/test14.10/Delete.php?Masinhvien=".$row["Masinhvien"]."'>Xóa</a>"
					
					."<td>";
					echo "</tr>";
				}
			}
			?>
		</tbody>
	</table>

		<?php
			if($_SERVER['REQUEST_METHOD']=='POST' and isset( $_POST["btnSearch"])){
				Search();
			}
		function search(){
		echo "<script type='text/javascript'>var Main=document.getElementById('tblMain');Main.innerHTML=''</script>";
			$key = $_POST['txtSearch'];
			$conn = mysqli_connect("localhost","root","","test");
			$query = "SELECT * FROM sinhvien WHERE Tensinhvien LIKE N'%".$key."%'";
			$result= mysqli_query($conn, $query);

			if(mysqli_num_rows($result)){
			echo "<table><thead>";
                echo "<th>Mã sinh viên</th>
                        <th>Tên sinh viên</th>
                        <th>Quê quán</th>
                        <th>Thao tác</th>";
                echo "</thead>";

				while ($row= mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["Masinhvien"]."</td>";
					echo "<td>".$row["Tensinhvien"]."</td>";
					echo "<td>".$row["Quequan"]."</td>";
					echo "<td>".
					"<a href='/test14.10/Update.php?Masinhvien=".$row["Masinhvien"]."'>Sửa</a>".
					"<a href='/test14.10/Delete.php?Masinhvien=".$row["Masinhvien"]."'>Xóa</a>"
					
					."<td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		}
			?>
				<a href="/test14.10/Create.php">Thêm</a>
			</div>
</body>
</html>