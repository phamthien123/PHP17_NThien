<?php
	$fileUpload = $_FILES['file-upload'];
	
	if($fileUpload['name'] != null){
		$fileName = $fileUpload['tmp_name'];
		$destions  = './filenes/'.$fileUpload['name'];
		move_uploaded_file($fileName, $destions);
	}