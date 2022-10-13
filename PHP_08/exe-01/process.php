<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Process</title>
</head>
<body>
	<div id="wrapper">
    	<div class="title">PROCESS</div>
        <div id="form">   
			<?php
				require_once 'functions.php';
				session_start();
				$xml = simplexml_load_file('data/timeout.xml');
				$timeout = $xml->timeout;
				if(@$_SESSION['flagPermission']==true){
					if($_SESSION['timeout'] + $timeout > time()){
						// echo '<h3>Xin chào: '.$_SESSION['fullName'].'</h3>';
						// echo '<a href="admin.php">Đăng xuất</a>';

						//chuyển trang
						if($_SESSION['role'] == 'admin'){
							header('location: admin.php');
						}elseif($_SESSION['role'] == 'member'){
							header('location: member.php');
							exit();
						}
					}else{
						session_unset();
						header('location: login.php');
						exit();
					}
				}else{
					if(!checkEmpty($_POST['username']) && !checkEmpty($_POST['password'])){
						$username 	= $_POST['username'];
						$password 	= md5($_POST['password']);
					
                  		$jsonData 	= file_get_contents('data/userinfo.json');
						$arrData   	= json_decode($jsonData, true);
						$userInfo 	= [];
						foreach($arrData as $key => $value){
							if($value['username'] == $username && $value['password'] == $password){
								$userInfo = $value;
								break;
							}
						}
						if(!empty($userInfo)){
							$_SESSION['fullName'] 		= $userInfo['fullname'];
							@$_SESSION['flagPermission'] = true;
							$_SESSION['timeout'] 		= time();
							$_SESSION['role'] 			= $userInfo['role'];
							//chuyển trang
							if($userInfo['role'] == 'admin'){
								header('location: admin.php');
								exit();
							}elseif($userInfo['role'] == 'member'){
								header('location: member.php');
								exit();
							}
						}
                 	else{
                     header('location: login.php');
							exit();
                  }
					}else{
						header('location: login.php');
						exit();
					}
				}
			?>
        </div>       
    </div>
</body>
</html>
