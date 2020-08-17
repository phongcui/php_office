<?php



            //     $timeout = $timeupdate;
            

            // $xml->asXML("./data/timeout.xml");
            

// update
if(isset($_POST["timedo"])){
    $timeupdate = '';

    $timeupdate = $_POST["timedo"]  ;


    $xml = simplexml_load_file("./data/timeout.xml") or die("Error: Cannot create object");
    $timeout = $xml->timeout;

    
    echo $timeout;

    $timeout = $timeupdate;

    $xml2 = file_put_contents("./data/timeout.xml",$timeout->saveXML());
}





// save the updated document
// $xml->asXML('./data/timeout.xml');





?>

<form action="#" method="POST">
    <input type="text" value="<?php echo $timeout  ?>" name="timedo">
    <button type="submit">Save</button>


</form>

<?php


?>
