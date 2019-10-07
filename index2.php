<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php include_once("nav.php"); ?>
	
	<form action="index2.php" method="post" accept-charset="utf-8">
		<input type="text" name="num1" placeholder="so thu nhat" value="<?php echo $_GET["num1"]; ?>">
		<input type="text" name="num2" placeholder="so thu hai" value="<?php echo $_GET["num2"]; ?>">
		<select name="operator" id="" value="">
			<option value="none">Vui lòng chọn</option>
			<option <?php echo $_GET["operator"] == "add" ? "selected" : ""; ?> value="add">Cộng</option>
			<option <?php echo $_GET["operator"] == "subtract" ? "selected" : ""; ?> value="subtract">Trừ</option>
			<option <?php echo $_GET["operator"] == "multiply" ? "selected" : ""; ?> value="multiply">Nhân</option>
			<option <?php echo $_GET["operator"] == "divide" ? "selected" : ""; ?> value="divide">Chia</option>
		</select>
		<button type="submit" name="btntinh" value="1">Tính</button>
	</form>	
	<?php 
		if (isset($_GET["btntinh"])) {
			$num1 =$_GET["num1"];
			$num2 =$_GET["num2"];
			$operator =$_GET["operator"];
			
			switch ($operator) {
				case 'add':
					$result = $num1 + $num2;
					break;
				case 'subtract':
					$result = $num1 - $num2;
					break;
				case 'multiply':
					$result = $num1 * $num2;
					break;
				case 'divide':
					$result = $num1 / $num2;
					break;
				case 'none':
					$result = 'chon phep tinh';
					break;
				
				default:
					// code...
					break;
			}
			echo " ket qua la $result";
		}
	 ?>
</body>
</html>