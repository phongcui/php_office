<?php
				$str = file_get_contents('./users.json');
				$json = json_decode($str, true); //
                echo '<pre>' . print_r($json, true) . '</pre>';
                
                ?>