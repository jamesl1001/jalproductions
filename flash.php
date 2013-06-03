<!DOCTYPE HTML>
<html>
<head>
    <?php include("includes/head.php"); ?>
</head>
<body class="<?php include("includes/bodyclass.php"); ?>">
    <?php include("includes/header.php"); ?>

    <div id="viewport">
        <div id="page">
            <h2>Flash</h2>

            <div class="imagebox_wrapper">
                <?php
                    include 'includes/getOrientation.php';

                    $feed      = simplexml_load_file('http://rss.ngfiles.com/users/2389000/fu5ion/flash/');
                    $channel   = $feed->channel;
                    $i         = 0;

                    $map = array(
                        'http://jalproductions.co.uk/img/animation/switch.jpg',
                        'http://jalproductions.co.uk/img/games/dropthru.jpg',
                        'http://picon.ngfiles.com/495000/portal_495315.gif',
                        'http://jalproductions.co.uk/img/animation/goodnightfear.jpg',
                        'http://jalproductions.co.uk/img/games/alphaspeed.jpg',
                        'http://jalproductions.co.uk/img/animation/spawn.jpg',
                        'http://jalproductions.co.uk/img/animation/run.jpg',
                        'http://picon.ngfiles.com/456000/portal_456855.gif',
                        'http://picon.ngfiles.com/436000/portal_436382.gif',
                        'http://jalproductions.co.uk/img/games/mashedup.jpg'
                    );

                    foreach($channel->item as $item):
                        $title  = $item->title;
                        $title2 = str_replace("\"", "'", $title);
                        $url    = $item->link;
                        $date   = $item->pubDate;
                        $desc   = $item->description;
                        $orientation = getOrientation($map[$i]);
                    ?>
                       <div class="imagebox"><a href="<?= $url; ?>" target="_blank"><img src="<?= $map[$i]; ?>" class="<?= $orientation; ?>" alt="<?= $title2; ?>" title="<?= $title2; ?>"/></a></div>
                    <?php
                        $i++;
                        endforeach;
                ?>
            </div>
        </div>

        <?php include("includes/menu.php"); ?>
    </div>

    <?php include("includes/scripts.php"); ?>
</body>
</html>