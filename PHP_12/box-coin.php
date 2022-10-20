<?php
$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
    'start' => '1',
    'limit' => '10',
    'convert' => 'USD'
];

$headers = [
    'Accepts: application/json',
    'X-CMC_PRO_API_KEY: 0a54b3d0-67ae-457a-b5ff-179a2a3fad97'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => $request,            // set the request URL
    CURLOPT_HTTPHEADER => $headers,     // set the headers 
    CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response
// print_r(json_decode($response)); // print json decoded response
$rssArray = json_decode($response, true);
$items = $rssArray['data'];
$htmlCoin = "";
foreach ($items as $value) {
    $name = $value['name'];
    $price = round($value['quote']['USD']['price'], 2);
    $persenchange24h = $value['quote']['USD']['percent_change_24h'];
    $change24h = round($value['quote']['USD']['percent_change_24h'], 2);
    $class = ($persenchange24h >= 0) ? 'text-success' : 'text-danger';

    $htmlCoin .= ('
    <tr>
        <td>' . $name . '</td>
        <td>$' . $price . '</td>
        <td><span class=' . $class . '>' . $change24h . '%</span></td>
    </tr>');
}

curl_close($curl); // Close request
?>
<table class="table table-sm">
    <thead>
        <tr>
            <th><b>Name</b></th>
            <th><b>Price (USD)</b></th>
            <th><b>Change (24h)</b></th>
        </tr>
    </thead>
    <tbody>
        <?= $htmlCoin; ?>
    </tbody>
</table>