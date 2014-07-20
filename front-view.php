<!DOCTYPE HTML>
<html>
<head>
    <?php require_once('includes/head.php'); ?>
</head>
<body>
    <?php require_once('includes/header.php'); ?>
    <div id="viewport">
        <div id="page">
            <?php require_once("views/$file.php"); ?>
        </div>
        <?php include('includes/menu.php'); ?>
    </div>
    <?php require_once('includes/footer.php'); ?>
    <?php require_once('includes/scripts.php'); ?>
</body>
</html>