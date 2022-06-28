<?php

function requestPlayer($videoId)
{
    /**
     * requestPlayer - function that requests InnerTube `player` to get the video source and video info
     * 
     * @author Ian Hiew(pixdo.et@gmail.com)
     * @param string $videoId - the video id to fetch `player` for
     */
    include("includes/config.inc.php");
    $req_arr = json_encode(
        array(
            'context' =>
            array(
                'client' =>
                array(
                    'hl' => 'en',
                    'clientName' => 'WEB',
                    'clientVersion' => $INNERTUBE_CONTEXT_CLIENT_VERSION,
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
    // otherwise unsupported browser
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // so that the 1 doesnt show
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: ", //sapisidhash,
        "Content-Type: application/json",
        "X-Goog-AuthUser: 0",
        "X-Origin: https://www.youtube.com",
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
    curl_setopt($ch, CURLOPT_USERAGENT, $INNERTUBE_REQUEST_USER_AGENT);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/player?key=" . $INNERTUBE_REQUEST_API_KEY);

    $result = curl_exec($ch);
    return $result;
}
function requestVideoSrc($videoId)
{
    /**
     * requestVideoSrc - same as requestPlayer, but uses ANDROID client to fetch more reliable video sources.
     * 
     * @author Ian Hiew(pixdo.et@gmail.com)
     * 
     * @param string $videoId - the video id to fetch for
     */
    include("includes/config.inc.php");
    $req_arr = json_encode(
        array(
            'context' =>
            array(
                'client' =>
                array(
                    'hl' => 'en',
                    'clientName' => 'ANDROID',
                    'clientVersion' => $ANDROIDTUBE_REQUEST_CLIENT_VERSION,
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
    $ua = $INNERTUBE_REQUEST_USER_AGENT;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "X-Goog-AuthUser: 0",
        "X-Origin: https://www.youtube.com",
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/player?key=" . $INNERTUBE_REQUEST_API_KEY);

    $result = curl_exec($ch);
    $mainResponseObject = json_decode($result);
    # check if there's a video src or something or something or SOMETHING
    if (isset($mainResponseObject->streamingData->formats[1]->url)) {
        $videoLink = $mainResponseObject->streamingData->formats[1]->url;
        return $videoLink;
    }
}
