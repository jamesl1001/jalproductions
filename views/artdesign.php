<h2>Art &amp; Design</h2>

<div class="imagebox_wrapper">
    <?php
        include 'php/getDeviations.php';
        $html = getDeviations('http://backend.deviantart.com/rss.xml?q=gallery:fu51on/27123352', 16);
        echo $html;
    ?>
</div>

<?php include('includes/imageviewer.php'); ?>