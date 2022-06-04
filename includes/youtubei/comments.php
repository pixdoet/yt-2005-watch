<?php

/**
 * Simple comment fetcher for YouTubei /next
 * 
 * @author Ian Hiew (pixdo.et@gmail.com)
 */

include("initial.php");

function fetchComment($videoId, $continuation)
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
        'continuation' => $continuation,
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


/*if (isset($_GET['v'])) {
    $videoId = $_GET['v'];
    // fetch the comment continuation
    $initialResponseContext = json_decode(fetchInitialNext($videoId));
    $continuation = $initialResponseContext
        ->contents
        ->twoColumnWatchNextResults
        ->results
        ->results
        ->contents[3]
        ->itemSectionRenderer
        ->contents[0]
        ->continuationItemRenderer
        ->continuationEndpoint
        ->continuationCommand
        ->token;
    // echo (json_encode(array("continuation" => $continuation)));
    // fetch the comments
    header("Content-Type: application/json");
    $mainResponseContext = json_decode(fetchComment($videoId, $continuation));
    echo json_encode($mainResponseContext);
} else {

    $err = array(
        "error" => "No video ID provided. Add one by adding ?v=<video_id> to the URL.",
        "status" => 1
    );
    echo (json_encode($err));
}
*/