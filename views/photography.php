<h2>Photography</h2>

<div class="imagebox_wrapper">
    <?php
        include 'php/getDeviations.php';
        $html = getDeviations('http://backend.deviantart.com/rss.xml?q=gallery:fu51on/54555081');
        echo $html;
    ?>
</div>

<?php include('includes/imageviewer.php'); ?>