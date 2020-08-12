<?php
	
	require_once './define.php';

	function showAll($path, &$newString ){
		$data	= scandir($path);
		
		$newString .= '<ul>';
		foreach($data as $key => $value){
			if($value != '.' && $value != '..'){
				echo '<br>';
				

				$dir	= $path . '/' . $value;

				$levelFolder = count(explode("/",$dir)) - 2;
				// echo '<pre>';
				// print_r($levelFolder);
				// echo '</pre>';

				// $level = $levelFolder - 2;
				$ext = pathinfo($dir, PATHINFO_EXTENSION);

				// echo '<pre>';
				// print_r($ext);
				// echo '</pre>';
			

				if(is_dir($dir)){

					$newString .= '<li><img src="./data/images/icons8-folder.svg"> ' . $value . "- $levelFolder";
					showAll($dir, $newString);
					$newString .= '</li>';
					

				}else{
					// if($ext == 'mp3'){
					// 	$icon = "./images/icons8-mp3-64.png";
					// 	$newString .= "<li><img src=$icon> " . $value .  "</li>";
					// }
					// if($ext == 'txt'){
					// 	$newString .=	'<li><img src="./images/files-and-folders.png" style="width=20px"> ' . $value .  '</li>';
					// }
					// if($ext == 'ini'){
					// 	$newString .=	'<li><img src="./images/files-and-folders.png" style="width=20px"> ' . $value .  '</li>';
					// }
					// else{
						
					// }
					// $text = 'txt';
					$icon = './data/images/icons8-file.svg';
						foreach (ARR_EXT as $key => $value) {
							echo '<pre>';
							print_r($value);
							echo '</pre>';

							if(in_array($ext,$value)){
								$icon = $key;
							break;
							}


							// $newString .="<li><img src=$icon> " . $value .  '</li>';
						
						}
						$newString .="<li><img src=$icon> " . $value .  '</li>';





					
					
				}
			}
		}
		$newString .= '</ul>';		
	}
	
	showAll('./data', $newString);
	echo $newString;
	
	
	
	
	
	
	

	
