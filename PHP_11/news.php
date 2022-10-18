<?php
$rssObj = simplexml_load_file("https://vnexpress.net/rss/oto-xe-may.rss", "SimpleXMLElement", LIBXML_NOCDATA);
$rssObj = $rssObj->channel;
$rssJson = json_encode($rssObj);
$rssArray = json_decode($rssJson, true);
$items = $rssArray['item'];
$html = "";
foreach ($items as $value) {
    $link = $value['link'];
    $title = $value['title'];
    $date = strtotime($value['pubDate']);
    $newformat = date('h:i:s d-m-Y',$date);
    preg_match_all('#.*src="(.*)".*br>(.*)<end>#imsU', $value['description'] . '<end>', $matches);
    $description = $matches[2][0];
    $image = $matches[1][0];
    $html .=  sprintf('<div class="col-md-6 col-lg-4 p-3">
    <div class="entry mb-1 clearfix">
        <div class="entry-image mb-3">
            <a href="%s" target="_blank" style="background: url(%s) no-repeat center center; background-size: cover; height: 278px;"></a>
        </div>
        <div class="entry-title">
            <h3><a href="%s" target="_blank">%s</a></h3>
        </div>
        <div class="entry-content">%s</div>
        <div class="entry-meta no-separator nohover">
            <ul class="justify-content-between mx-0">
                <li><i class="icon-calendar2"></i>%s</li>
                <li>vnexpress.net</li>
            </ul>
        </div>
        <div class="entry-meta no-separator hover">
            <ul class="mx-0">
                <li><a href="%s" target="_blank">Xem &rarr;</a></li>
            </ul>
        </div>
    </div>
</div>', $link ,$image,$link, $title,  $description,$newformat, $link);
}
?>

<div class="row grid-container infinity-wrapper clearfix align-align-items-start">
    <?= $html; ?>
</div>