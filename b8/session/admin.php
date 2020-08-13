<?php
			$xml = simplexml_load_file("./data/timeout.xml") or die("Error: Cannot create object");
            $timeout = $xml->timeout;
            
            echo $timeout;

            $timeupdate = '';

            $_POST['timedo'] = $timeupdate;

            



?>

<form action="#" method="post">
    <input type="text" value="<?php echo $timeout  ?>" name="timedo">
    <button type="submit">Save</button>


</form>


