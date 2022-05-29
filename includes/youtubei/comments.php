<?php
// comments.php for requesting comments
/*
    First time doing this pls dont be mad at me :pleading_face: ^_^

    @author Ian Hiew (pixdo.et@gmail.com)
*/
function requestInitialNext($videoId)
{
    include("includes/config.inc.php");
    $req_arr = json_encode(
        array(
            'context' =>
            array(
                'client' =>
                array(
                    'hl' => 'en',
                    'clientName' => 'WEB',
                    'clientVersion' => '2.20220420.01.00',
                    'mainAppWebInfo' =>
                    array(
                        'graftUrl' => '/watch?v=' . $videoId,
                    ),
                ),
            ),
            'videoId' => $videoId,
        )
    );
    $ch = curl_init();
    $ua = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:100.0) Gecko/20100101 Firefox/100.0";
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // so that the 1 doesnt show
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: ", //sapisidhash,
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
