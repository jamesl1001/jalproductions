<!DOCTYPE HTML>
<html>
<head>
    <?php include("includes/head.php"); ?>
</head>
<body class="<?php include("includes/bodyclass.php"); ?>">
    <?php include("includes/header.php"); ?>

    <div id="viewport">
        <div id="page">
            <h2>Photography</h2>

            <div class="imagebox_wrapper">
                <?php
                    include 'includes/getDeviations.php';
                    // $_SESSION['loaded'] = (isset($_SESSION['loaded'])) ? $_SESSION['loaded'] : 16;
                    $html = getDeviations('http://backend.deviantart.com/rss.xml?q=gallery:fu51on/27123391', 16);
                    echo $html;
                    // var_dump($_SESSION['loaded']);
                ?>
            </div>
            
            <div class="button" id="load_more" data-page="photography">load more <noscript>(requires Javascript)</noscript></div>
        </div>

        <?php include("includes/menu.php"); ?>
    </div>

    <?php include("includes/scripts.php"); ?>
</body>
</html>