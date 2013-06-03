<?php
include 'getOrientation.php';

function getDeviations($url, $limit = null, $start = 0) {
    $feed      = simplexml_load_file($url);
    $channel   = $feed->channel;
    $i         = 0;
    $html      = '';

    foreach($channel->item as $item) {
        if($i < $start) { $i++; continue; }
        if(isset($limit) && $i == $start + $limit) break;

        $title = $item->title;
        $url   = $item->link;
        $date  = $item->pubDate;
        $thumb = $item->children('media', true)->thumbnail->{1}->attributes()->url;
        $image = $item->children('media', true)->content->attributes()->url;
        $orientation = getOrientation($image);

        $html .= "<div class=\"imagebox image\"><a href=\"$image\"><img src=\"$thumb\" class=\"$orientation\" alt=\"$title\" title=\"$title\"/></a></div>";
        $i++;
    }
    return $html;
}