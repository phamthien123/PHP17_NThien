<?php
	require_once 'functions.php';
	session_start();
	$xml = simplexml_load_file('data/timeout.xml');
	$timeout = $xml->timeout;
	$message = "";
	if(isset($_POST['submit'])){
		if(intval($_POST['timeout'])){ //hàm kiểm tra có phải số
			$xml->timeout = $_POST['timeout'];
			file_put_contents('data/timeout.xml', $xml->saveXML());
		}else{
			$message = '<p style="color:red;">Vui lòng nhập vào một số lớn hơn hoặc bằng 0!</p>';
		}
	}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Admin</title>
</head>
<body>
	<div id="wrapper">
    	<div class="title">ADMIN</div>
		 <div id="form">   
			 <form action="process.php" method="post" name="add-form">
				 <div class="row">
					<?php echo 'Xin chào: '. $_SESSION['fullName'] . '<a href="logout.php"> Đăng xuất</a>'?>
				</div>
				<div class="row">
					<p>Timeout</p>
					<input type="text" name="timeout" value="<?php echo @$timeout ?>">
					<?php echo @$message ?>
				</div>
				<div class="row">
					<input type="submit" value="Cập nhật" name="submit">
				</div>
			</form>    
        </div>
    </div>
</body>
</html>
