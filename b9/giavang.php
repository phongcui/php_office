<?php
$xml = simplexml_load_file("./giavang.xml") or die("Error: Cannot create object");

$city = $xml->ratelist->city;

$json = json_encode($city);
$array = json_decode($json,TRUE);




$goldList = $array['item'];




$xhtml = '';    

foreach ($goldList as $goldItem) {
    $goldItem = $goldItem['@attributes'];

    $xhtml .= '<tr><td>'.$goldItem['type'].'</td>
    <td>'.$goldItem['buy'].'</td>
    <td>'.$goldItem['sell'].'</td></tr>';
    
    }




?>




<div class="box mt-4">
    <h3 class="mb-1">Giá vàng</h3>
    <div class="card card-body">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th><b>Loại vàng</b></th>
                    <th><b>Mua vào</b></th>
                    <th><b>Bán ra</b></th>
                </tr>
            </thead>
            <tbody>
            <?php echo $xhtml ?>
                

            </tbody>
        </table>
    </div>
</div>