<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Artitus' <?php echo $_GET["id"] . $_GET["type"]; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://s3.amazonaws.com/artit.us/branding/favicon.png">
    <link rel="apple-touch-icon" href="https://s3.amazonaws.com/artit.us/branding/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.css">\

    <!-- Discord and other site embed support -->
    <meta name="og:site_name" content="Ma.ssive.wang File Uploader"/>
    <meta property="og:type" content="website">
    <meta property="og:title" content="Artitus' File Uploader"/>
    <meta property="og:description"
          content="Uploaded on <?php echo date("F d Y H:i:s.", filemtime($_GET["id"] . '.' . $_GET["type"])); ?>"/>
    <meta property="og:url" content="<?php echo 'https:/' . $_SERVER['REQUEST_URI']; ?>"/>
    <?php
    if ($_GET["type"] == "png" || $_GET["type"] == "gif" || $_GET["type"] == "jpg") {
        list($width, $height) = getimagesize($_GET["id"] . '.' . $_GET["type"]);
        echo '<meta property="og:image" content="https://' . $_SERVER['HTTP_HOST'] . '/' . $_GET["id"] . '.' . $_GET["type"] . '"/>';
    } else if ($_GET["type"] == "mp4") {
        echo '<meta property="og:video" content="https://' . $_SERVER['HTTP_HOST'] . '/' . $_GET["id"] . '.' . $_GET["type"] . '" />';
    }
    ?>
</head>

<style>

    body {
        overflow: hidden
    }

    #page:before {
        position: absolute;
        content: "";
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: -1;
        background: url(<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/' . $_GET["id"] . '.' . $_GET["type"]. ' '; ?>) no-repeat center center;
        background-size: cover;
        filter: blur(10px);
        transform: scale(1.3)
    }

    #page {
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-items: center;
    }

    .content {
        height: auto;
        width: 100%;
        display: flex;
        align-items: center;
        justify-items: center;
    }

    img {
        width: auto;
        height: auto;
        margin-left: auto;
        margin-right: auto;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        object-fit:contain
    }
</style>

<body>

<div id="page">
    <div class="content">
        <?php
        if ($_GET["type"] == "png" || $_GET["type"] == "gif" || $_GET["type"] == "jpg") {
            echo '<img src="https://' . $_SERVER['HTTP_HOST'] . '/' . $_GET["id"] . '.' . $_GET["type"] . '"/>';
        } else {
            echo 'y u not has gud lenk?';
        } ?>
    </div>
</div>

</body>
</html>
