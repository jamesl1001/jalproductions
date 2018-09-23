<h2>Music</h2>

<div class="imagebox_wrapper no-iv">
    <?php
        $feed      = simplexml_load_file('https://rss.ngfiles.com/users/2389000/fu5ion/audio/');
        $channel   = $feed->channel;
        $i         = 1;

        foreach($channel->item as $item):
            $title = $item->title;
            $url   = $item->link;
            $date  = $item->pubDate;
            $desc  = $item->description;
        ?>
           <div class="imagebox"><a href="<?= $url; ?>" target="_blank"><img src="https://jalproductions.co.uk/img/music/music<?= $i; ?>.jpg" alt="<?= $title; ?>" title="<?= $title; ?>"/></a></div>
        <?php
            $i++;
            endforeach;
    ?>
</div>