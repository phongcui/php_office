<?php
			$xml = simplexml_load_file("./data/timeout.xml") or die("Error: Cannot create object");
            $timeout = $xml->timeout;
            
            echo $timeout;

?>

<form action="#" method="post">
    <input type="text" value="<?php echo $timeout  ?>">
    <button type="submit">Save</button>


</form>


