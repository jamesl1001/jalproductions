<!DOCTYPE HTML>
<html>
<head>
    <?php include("includes/head.php"); ?>
</head>
<body class="<?php include("includes/bodyclass.php"); ?>">
    <?php include("includes/header.php"); ?>

    <div id="viewport">
        <div id="page">
            <h2>Music</h2>

            <div class="imagebox_wrapper">
                <?php
                    include 'includes/getOrientation.php';

                    $feed      = simplexml_load_file('http://rss.ngfiles.com/users/2389000/fu5ion/audio/');
                    $channel   = $feed->channel;
                    $i         = 1;

                    foreach($channel->item as $item):
                        $title = $item->title;
                        $url   = $item->link;
                        $date  = $item->pubDate;
                        $desc  = $item->description;
                    ?>
                       <div class="imagebox"><a href="<?= $url; ?>" target="_blank"><img src="http://jalproductions.co.uk/img/music/music<?= $i; ?>.jpg" class="landscape" alt="<?= $title; ?>" title="<?= $title; ?>"/></a></div>
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