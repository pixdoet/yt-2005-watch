<?php

/**
 * Request /next for the comment continuation
 * 
 * @author Ian Hiew (pixdo.et@gmail.com)
 */
function fetchInitialNext($videoId)
{
    $req_arr = json_encode(array(
        'context' =>
        array(
            'client' =>
            array(
                'hl' => 'en',
                'userAgent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:101.0) Gecko/20100101 Firefox/101.0,gzip(gfe)',
                'clientName' => 'WEB',
                'clientVersion' => '2.20220602.00.00',
                'mainAppWebInfo' =>
                array(
                    'graftUrl' => '/watch?v=' . $videoId,
                ),
            ),
        ),
        'videoId' => $videoId,
        'captionsRequested' => true,
    ));
    $ch = curl_init();
    $ua = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:100.0) Gecko/20100101 Firefox/100.0";
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // so that the 1 doesnt show
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "X-Goog-AuthUser: 0",
        "X-Origin: https://www.youtube.com",
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/next?key=AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8");

    $result = curl_exec($ch);
    return $result;
}
