<?php
include 'getThumbnail.php';

function getDeviations($url, $limit = null, $start = 0, $loadmore = false) {
    $feed      = simplexml_load_file($url);
    $channel   = $feed->channel;
    $i         = 0;
    $html      = '';

    foreach($channel->item as $item) {
        if($i < $start) { $i++; continue; }
        if(isset($limit) && $i == $start + $limit) break;

        $title = (String)$item->title;
        $image = (String)$item->children('media', true)->content->attributes()->url;
        $thumb = getThumbnail($image, $loadmore);

        $html .= "<a href=\"$image\" class=\"imagebox\"><img src=\"$thumb\" alt=\"$title\" title=\"$title\"/></a>";
        $i++;
    }

    return $html;
}