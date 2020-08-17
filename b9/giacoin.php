<?php 

$json = file_get_contents('https://api.coingecko.com/api/v3/coins/markets?vs_currency=vnd&order=market_cap_desc&per_page=10&page=1&sparkline=false');
// $json = json_encode($json);
$obj = json_decode($json,TRUE);

// echo '<pre>';
// print_r($obj);
// echo '</pre>';

$xhtml = '';



foreach ($obj as $dataCoin) {

    // number_format($number);
    $xhtml .= '<tr>
    <td>'.$dataCoin['id'].'</td>
    <td>'.number_format($dataCoin['current_price']).'</td>
    <td><span class="text-success">'.$dataCoin['price_change_percentage_24h'].'</span></td>
</tr>';
}

?>







<div class="box mt-4">
    <h3 class="mb-1">Giá coin</h3>
    <div class="card card-body">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th><b>Name</b></th>
                    <th><b>Price</b></th>
                    <th><b>Change (24h)</b></th>
                </tr>
            </thead>
            <tbody>

                <?php echo $xhtml; ?>

            </tbody>
        </table>
    </div>
</div>