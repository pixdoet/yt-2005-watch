<?php


include("initial.php");
function fetchComment($videoId, $continuation)
{
    /**
     * fetchComment - function that requests InnerTube `next` to get comment metadata
     * 
     * @author Ian Hiew (pixdo.et@gmail.com)
     * 
     * @param string $videoId - the video id to get comments for
     * @param string $continuation - the continuation from the initial `next` request
     */

    include_once("includes/config.inc.php");

    $req_arr = json_encode(array(
        'context' =>
        array(
            'client' =>
            array(
                'hl' => 'en',
                'userAgent' => INNERTUBE_REQUEST_USER_AGENT,
                'clientName' => 'WEB',
                'clientVersion' => INNERTUBE_CONTEXT_CLIENT_VERSION,
                'mainAppWebInfo' =>
                array(
                    'graftUrl' => '/watch?v=' . $videoId,
                ),
            ),
        ),
        'continuation' => $continuation,
    ));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // so that the 1 doesnt show
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt"); // ????
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "X-Goog-AuthUser: 0",
        "X-Origin: https://www.youtube.com",
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
    curl_setopt($ch, CURLOPT_USERAGENT, INNERTUBE_REQUEST_USER_AGENT);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/next?key=" . INNERTUBE_REQUEST_API_KEY);

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