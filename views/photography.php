<h2>Photography</h2>

<div class="imagebox_wrapper">
    <?php
        include 'php/getDeviations.php';
        $_SESSION['loaded-photography'] = (isset($_SESSION['loaded-photography'])) ? $_SESSION['loaded-photography'] : 16;
        $html = getDeviations('http://backend.deviantart.com/rss.xml?q=gallery:fu51on/54555081', $_SESSION['loaded-photography']);
        echo $html;
    ?>
</div>

<div class="button" id="load_more" data-page="photography">load more <noscript>(requires Javascript)</noscript></div>

<?php include('includes/imageviewer.php'); ?>