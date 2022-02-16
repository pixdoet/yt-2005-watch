<?php
// channel.php requests channel info from internal api (/api/channels/about.php)

function getChannel($chid)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "/youtubei_play/api/channels/about.php?id=".$chid);
    $result = curl_exec($ch);
    print_r(json_decode($result));
    return $result;
}
getChannel("UC0ifhOnVBCUkpS-_FhcgQEQ");