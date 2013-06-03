<!DOCTYPE HTML>
<html>
<head>
    <?php include("includes/head.php"); ?>
</head>
<body class="<?php include("includes/bodyclass.php"); ?>">
    <?php include("includes/header.php"); ?>

    <div id="viewport">
        <div id="page">
            <h2>Web</h2>
            <div class="centre">
                <?php
                    $site       = $_GET['site'];
                    $feed       = simplexml_load_file('web.xml');
                    $item       = $feed->xpath("//item[@short='$site']");
                    $newer      = $feed->xpath("//item[@short='$site']/preceding-sibling::*[1]");
                    $older      = $feed->xpath("//item[@short='$site']/following-sibling::*[1]");

                    if(!empty($item)) {
                        // Single item
                        getData($item);
                ?>
                    <div id="web_navigation">
                        <?php if(!empty($newer)): $newerShort = $newer[0]->attributes()->short; ?>
                            <a href="web?site=<?= $newerShort; ?>"><div class="button button-half web_navigation_button" id="web_newer">Newer</div></a>
                        <?php endif; ?>
                        <?php if(!empty($older)): $olderShort = $older[0]->attributes()->short; ?>
                            <a href="web?site=<?= $olderShort; ?>"><div class="button button-half web_navigation_button" id="web_older">Older</div></a>
                        <?php endif; ?>
                    </div>

                    <div class="web_project" id="<?= $short; ?>">
                        <div class="col col-p">
                            <h3><?= $title; ?> <sup><?= $status; ?></sup></h3>
                            <?= $urlOutput; ?>
                            <h4>Client: <small><?= $client; ?></small></h4>
                            <h4>Brief:</h4>
                            <?= $brief; ?>
                            <h4>Technologies used:</h4>
                            <?= $techused; ?>
                        </div>
                        <div class="col col-s">
                            <img src="<?= $image; ?>" alt="<?= $title; ?>" class="web_image"/>
                        </div>
                    </div>
                <?php
                    } else {
                        // All items
                        foreach($feed->item as $item):
                            getData($item);
                        ?>
                        <div class="web_project" id="<?= $short; ?>">
                            <div class="col col-p">
                                <h3><?= $title; ?> <sup><?= $status; ?></sup><a href="web?site=<?= $short; ?>" class="web_link_icon">link</a></h3>
                                <?= $urlOutput; ?>
                                <h4>Client: <small><?= $client; ?></small></h4>
                                <h4>Brief:</h4>
                                <?= $brief; ?>
                                <h4>Technologies used:</h4>
                                <?= $techused; ?>
                            </div>
                            <div class="col col-s">
                                <img src="<?= $image; ?>" alt="<?= $title; ?>" class="web_image"/>
                            </div>
                        </div>
                        <hr>
                        <?php endforeach;
                    }

                    function getData($item) {
                        global $title, $short, $status, $urlOutput, $client, $brief, $techused, $image;

                        $title    = $item[0]->title;
                        $short    = $item[0]->attributes()->short;
                        $status   = $item[0]->status;
                        $url      = $item[0]->url;
                        $multiple = $item[0]->url->attributes()->multiple;
                        $client   = $item[0]->client;
                        $brief    = $item[0]->brief;
                        $techused = $item[0]->techused;
                        $image    = $item[0]->image;
                        if(isset($multiple)) {
                            $urlOutput = $url;
                        } else {
                            $urlOutput = "<a href=\"$url\" target=\"_blank\">$url</a>";
                        }
                    }
                ?>
            </div>
        </div>

        <?php include("includes/menu.php"); ?>
    </div>

    <?php include("includes/scripts.php"); ?>
</body>
</html>