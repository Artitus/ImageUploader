<?php

$image_dir = 'i';

$url = 'https://' . $_SERVER['HTTP_HOST'];
$path = explode("/", $_SERVER['REQUEST_URI']);
$file_id = $path[2];
$file_type = $path[1];
$image_local = $image_dir . '/' . $file_id . '.' . $file_type;
$image = $url . '/' . $image_dir . '/' . $file_id . '.' . $file_type;
$upload_date = date("d F Y g:i A T", filemtime($image_local));

echo <<<EOT
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Artitus' File Uploader</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://s3.amazonaws.com/artit.us/branding/favicon.png">
    <link rel="apple-touch-icon" href="https://s3.amazonaws.com/artit.us/branding/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.css">

    <!-- Discord and other site embed support -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="og:site_name" content="Ma.ssive.wang File Uploader"/>
    <meta property="og:type" content="website">
    <meta property="og:title" content="Artitus' File Uploader"/>
    <meta property="og:description"
          content="Uploaded on $upload_date"/>
    <meta property="og:url" content="$url"/>
    <meta property="og:image" content="$image" />
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
        background: url($image) no-repeat center center;
        background-size: cover;
        filter: blur(5px);
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
            <img src="$image" />
    </div>
</div>

</body>
</html>
EOT;

?>