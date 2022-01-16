<?php
// channel.php requests channel info from internal api (/api/channels/about.php)

function getChannel($chid)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "./api/channels/about.php".$chid);
    curl_setopt($ch, CURLOPT_POST, false);
    $result = curl_exec($ch);
    
    return $result;
}