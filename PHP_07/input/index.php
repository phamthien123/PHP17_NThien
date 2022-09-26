<?php
	
	function showAll($path, &$newString ){
		$data	= scandir($path);
		
		$newString .= '<ul>';
		foreach($data as $key => $value){
			if($value != '.' && $value != '..'){
				$dir	= $path . '/' . $value;
				if(is_dir($dir)){
					$newString .= '<li><img src="./images/icons8-folder-16.png" alt="">' . $value;
					showAll($dir, $newString);
					$newString .= '</li>';
				}else{
					$newString .= '<li>F: ' . $value . '</li>';
				}
			}
		}
		$newString .= '</ul>';		
	}
	
	showAll('.', $newString);
	echo $newString;
	
	
	
	
	
	
	

	
