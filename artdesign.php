<!DOCTYPE HTML>
<html>
<head>
    <?php include('includes/head.php'); ?>
</head>
<body class="<?php include('includes/bodyclass.php'); ?>">
    <?php include('includes/header.php'); ?>

    <div id="viewport">
        <div id="page">
            <h2>Art &amp; Design</h2>

            <div class="imagebox_wrapper">
                <?php
                    include 'includes/getDeviations.php';
                    $html = getDeviations('http://backend.deviantart.com/rss.xml?q=gallery:fu51on/27123352', 16);
                    echo $html;
                ?>
            </div>

            <?php include('includes/imageviewer.php'); ?>
        </div>

        <?php include('includes/menu.php'); ?>
    </div>

    <?php include('includes/scripts.php'); ?>
</body>
</html>