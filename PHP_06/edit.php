<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE - ADD</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cancel-button').click(function(){
			window.location = 'index.php';
		});
	});
</script>
</head>
<body>
<?php
	require_once 'functions.php';
	
	$id	= $_GET['id'];
	$content	= file_get_contents("./files/$id.txt");
	$content	= explode('||', $content);
	$title				= $content[0];
	$description		= $content[1];
	$oldImage			= $content[2];
	
	$flag	= false;
	if(isset($_POST['title']) && isset($_POST['description'])){
		$title			= $_POST['title'];
		$description	= $_POST['description'];
		$fileUpload 	= $_FILES['file-upload'];
		
		// Error Title
		$errorTitle = '';
		if(checkEmpty($title)) 			$errorTitle = '<p class="error">Dữ liệu không được rỗng</p>';
		if(checkLength($title, 5, 100)) $errorTitle .= '<p class="error">Tiêu đề dài từ 5 đến 100 ký tự</p>';
		
		// Error Description
		$errorDescription = '';
		if(checkEmpty($description)) 			$errorDescription = '<p class="error">Dữ liệu không được rỗng</p>';
		if(checkLength($description, 10, 5000)) $errorDescription .= '<p class="error">Nội dung dài từ 10 đến 5000 ký tự</p>';
		// Error UpLoad
		$errorImg = '';
		$flagImage = false;
		if (!empty($fileUpload['name'])) {
			$flagImage = true;
			$configs 		= parse_ini_file('config.ini');
			$flagSize 		= checkSize($fileUpload['size'], $configs['min_size'], $configs['max_size']);
			$flagExtension 	= checkExtension($fileUpload['name'], explode('|', $configs['extension']));

			if(!$flagSize) $errorImg = '<p class="error">Dữ liệu phải từ 100mb -> 2KB</p>';
			if(!$flagExtension) $errorImg = '<p class="error">Dữ liệu file từ là '.str_replace('|',', ',$configs['extension']).'</p>';
		}
		
		// A-Z, a-z, 0-9: AzG09
		if($errorTitle == '' && $errorDescription == '' && $errorImg == ''){
			if($flagImage = false){
				$ImageNew = $oldImage;
			}
			else{
				$ImageNew = randomString(5).'.'.pathinfo($fileUpload['name'],PATHINFO_EXTENSION);
			}
			$data	= $title . '||' . $description. '||' . $ImageNew;
			
			$filename	= './files/' . $id . '.txt';
			if(file_put_contents($filename, $data)){
				if($flagImage = true){
					@unlink("./img/$oldImage");
					@move_uploaded_file($fileUpload['tmp_name'],'./img/'.$ImageNew);
				}
				$title			= '';
				$description	= '';
				$fileUpload		= '';
				$flag			= true;
			}
		}
		
	} 
?>
	<div id="wrapper">
    	<div class="title">PHP FILE - ADD</div>
        <div id="form">   
			<form action="#" method="post" name="add-form" enctype="multipart/form-data">
				<div class="row">
					<p>Title</p>
					<input type="text" name="title" value="<?php echo @$title;?>">
					<?php echo @$errorTitle; ?>
				</div>
				
				<div class="row">
					<p>Description</p>
					<textarea name="description" rows="5" cols="100"><?php echo @$description;?></textarea>
					<?php echo @$errorDescription?>
				</div>
				<div class="row">
					<p>Image New</p>
					<input type="file" name="file-upload">
					<?php echo @$errorImage ?>
				</div>
				<div class="row">
					<p>Old Image</p>
					<?= showImage("img/$oldImage", 'edit') ?>
				</div>
				<div class="row">
					<input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
				</div>
				
				<?php
					if($flag==true) echo '<div class="row"><p>Dữ liệu đã được ghi thành công!Click vào <a href="index.php">đây</a> đê quay về trang chủ.</p></div>'; 
				?>
								
			</form>    
        </div>
        
    </div>
</body>
</html>
