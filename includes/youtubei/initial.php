<?php

/**
 * Request /next for the comment continuation
 * 
 * @author Ian Hiew (pixdo.et@gmail.com)
 */
function fetchInitialNext($videoId)
{
    /**
     * fetchInitialNext - function that requests InnerTube `next` to get continuations needed for other functions
     * 
     * @param string $videoId - the video id to fetch `next` for
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
        'videoId' => $videoId,
        'captionsRequested' => true,
    ));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // so that the 1 doesnt show
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt");
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
