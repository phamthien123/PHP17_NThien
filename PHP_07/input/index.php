<?php


$arrExtension = [
	'icons8-code-16.png' => ['html', 'css', 'php', ],
	'icons8-document-16.png' => ['txt'],
	'icons8-image-16.png' => ['png', 'jpg', 'jpeg', ],
	'icons8-youtube-16.png' => ['mp4', 'mp3', 'avi', ],
];
function showAll($path, &$newString,$arrExtension)
{
	$data	= scandir($path);

	$newString .= '<ul>';
	foreach ($data as $key => $value) {
		if ($value != '.' && $value != '..') {
			$dir	= $path . '/' . $value;
			if (is_dir($dir)) {
				$level = count(explode('/',$dir)) - 1;
				$icon = "icons8-folder-16.png";
				$newString .= sprintf('<li><img src="./images/%s">%s - Level:%s ', $icon, $value,$level);
				showAll($dir, $newString,$arrExtension);
				$newString .= '</li>';
			} else {
				$icon = "icons8-file-16.png";
				$extension = pathinfo($value, PATHINFO_EXTENSION);
				foreach ($arrExtension as $key => $value) {
					if (in_array($extension, $value)) $icon = $key;
				}
				// switch ($extension) {
				// 	case 'html':
				// 	case 'css':
				// 	case 'php':
				// 		$icon = "icons8-code-16.png";
				// 		break;
				// }
				$newString .= sprintf('<li><img src="./images/%s">%s</li>', $icon, $extension);
			}
		}
	}
	$newString .= '</ul>';
}

showAll('.', $newString,$arrExtension);
echo $newString;
