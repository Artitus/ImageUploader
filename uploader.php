<?php

$secret_key = "penislicker"; //Set this as your secret key, to prevent others uploading to your server.
$sharexdir = ""; //This is your file dir, also the link..
$domain_url = 'https://ma.ssive.wang/';
$lengthofstring = 5; //Length of the file name

function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'));

    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}

if(isset($_POST['secret']))
{
    if($_POST['secret'] == $secret_key)
    {
        $filename = RandomString($lengthofstring);
        $target_file = $_FILES["sharex"]["name"];
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $sharexdir.$filename.'.'.$fileType))
        {
            echo $domain_url.'index.php?id='.$filename.'&type='.$fileType;
        }
        else
        {
            echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
        }
    }
    else
    {
        echo 'Invalid Secret Key';
    }
}
else
{
    echo 'No post data recieved';
}
?>