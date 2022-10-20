<?php
$linkRss = "https://sjc.com.vn/xml/tygiavang.xml";
$arrContextOptions = array(
    "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
    )
);

$context = stream_context_create($arrContextOptions);
$contents = simplexml_load_string(file_get_contents($linkRss, false, $context));
$contents = $contents->ratelist;
$rssJson = json_encode($contents);
$rssArray = json_decode($rssJson, true);
$items = $rssArray['city'][0]['item'];
$items = array_column($items, '@attributes');
$htmlGold = "";
foreach ($items as $value) {
    $type = $value['type'];
    $buy = $value['buy'];
    $sell = $value['sell'];
    $htmlGold .=  sprintf('
    <tr>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
    </tr>', $type, $buy, $sell);
}

?>
<table class="table table-sm">
    <thead>
        <tr>
            <th><b>Loại vàng</b></th>
            <th><b>Mua vào</b></th>
            <th><b>Bán ra</b></th>
        </tr>
    </thead>
    <tbody>
        <?= $htmlGold; ?>
    </tbody>
</table>