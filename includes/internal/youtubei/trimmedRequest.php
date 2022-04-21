<?php
// trimmed version of createRequest.php

// read functions
function requestBrowse($brid)
{
    // endpoint: /youtubei/v1/browse

    include("includes/config.inc.php");
    $req_arr = json_encode(
        array(
            'context' =>
            array(
                'client' =>
                array(
                    'visitorData' => 'Cgtjc1hsUzJrS2tlWSjImoiNBg%3D%3D',
                    'userAgent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:94.0) Gecko/20100101 Firefox/94.0,gzip(gfe)',
                    'clientName' => 'WEB',
                    'clientVersion' => '2.20211124.00.00',
                    'originalUrl' => 'https://www.youtube.com/feed/explore',
                ),
            ),
            'browseId' => $brid,
        )
    );
    $ch = curl_init();
    // otherwise unsupported browser
    $ua = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:100.0) Gecko/20100101 Firefox/100.0";
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // so that the 1 doesnt show
    curl_setopt($ch, CURLOPT_COOKIEFILE, "../../cookies.txt");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: ",
        "Content-Type: application/json",
        "X-Goog-AuthUser: 0",
        "X-Origin: https://www.youtube.com"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/browse?key=AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8");

    $result = curl_exec($ch);
    return $result;
}

// endpoint: /youtubei/v1/player
function requestPlayer($videoId)
{
    include("includes/config.inc.php");
    $req_arr = json_encode(
        array(
            'context' =>
            array(
                'client' =>
                array(
                    'visitorData' => 'Cgtjc1hsUzJrS2tlWSjImoiNBg%3D%3D',
                    'clientName' => 'WEB',
                    'userAgent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:94.0) Gecko/20100101 Firefox/94.0,gzip(gfe)',
                    'clientVersion' => '2.20211124.00.00',
                    'originalUrl' => 'https://www.youtube.com/watch?v=' . $videoId,
                ),
            ),
            'videoId' => $videoId,
            'playbackContext' =>
            array(
                'contentPlaybackContext' =>
                array(
                    'currentUrl' => '/watch?v=' . $videoId,
                    'referer' => 'https://www.youtube.com/',
                ),
            ),
        )
    );
    $ch = curl_init();
    // otherwise unsupported browser
    $ua = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:100.0) Gecko/20100101 Firefox/100.0";
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: ", //sapisidhash,
        "Content-Type: application/json",
        "X-Goog-AuthUser: 0",
        "X-Origin: https://www.youtube.com"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/player?key=AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8");

    $result = curl_exec($ch);
    return $result;
}

function requestChannel($channelId, $type)
{
    // first get browse endpoints, form a request to normal browse
    $getEp = json_decode(requestBrowse($channelId));
    if ($getEp) {
        $ep = $getEp->contents->twoColumnBrowseResultsRenderer->tabs;
        switch ($type) {
            case "videos":
                $brEp = $ep[1]->tabRenderer->endpoint->browseEndpoint->params;
                break;
            case "channels":
                $brEp = $ep[3]->tabRenderer->endpoint->browseEndpoint->params;
                break; //LMAO forgot
            case "about":
                $brEp = $ep[4]->tabRenderer->endpoint->browseEndpoint->params;
                break;
            default:
                $brEp = $ep[4]->tabRenderer->endpoint->browseEndpoint->params;
                break;
        }
    }
    // more advanced functions for browse
    include("includes/config.inc.php");
    $req_arr = json_encode(
        array(
            'context' =>
            array(
                'client' =>
                array(
                    'visitorData' => 'Cgtjc1hsUzJrS2tlWSiBnYaNBg%3D%3D',
                    'clientName' => 'WEB',
                    'userAgent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:94.0) Gecko/20100101 Firefox/94.0,gzip(gfe)',
                    'clientVersion' => '2.20211124.00.00',
                    'originalUrl' => 'https://www.youtube.com/feed/explore',
                ),
            ),
            'browseId' => $channelId,
            'params' => $brEp,
        )
    );

    $ch = curl_init();
    $ua = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:100.0) Gecko/20100101 Firefox/100.0";
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIEFILE, "../../cookies.txt");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: ",
        "Content-Type: application/json",
        "X-Goog-AuthUser: 0",
        "X-Origin: https://www.youtube.com"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/browse?key=AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8");

    $result = curl_exec($ch);
    return $result;
}

function requestSearch($query)
{
    // endpoint: /youtube1/v1/search

    include("includes/config.inc.php");
    $req_arr = json_encode(array(
        'context' =>
        array(
            'client' =>
            array(
                'visitorData' => 'Cgtjc1hsUzJrS2tlWSj0752NBg%3D%3D',
                'userAgent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:94.0) Gecko/20100101 Firefox/94.0,gzip(gfe)',
                'clientName' => 'WEB',
                'clientVersion' => '2.20211129.09.00',
                'originalUrl' => 'https://www.youtube.com/results?search_query=' . $query,
            ),
        ),
        'query' => $query,
        'webSearchboxStatsUrl' => '/search?oq=' . $query . '&gs_l=youtube.3...533.1044.0.1153.7.5.0.0.0.0.0.0..0.0....0...1ac.1.64.youtube..7.0.0....0.',
    ));
    $ch = curl_init();

    $ua = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:100.0) Gecko/20100101 Firefox/100.0";
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // so that the 1 doesnt show
    curl_setopt($ch, CURLOPT_COOKIEFILE, "../../cookies.txt");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: ",
        "Content-Type: application/json",
        "X-Goog-AuthUser: 0",
        "X-Origin: https://www.youtube.com"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/search?key=AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8");

    $result = curl_exec($ch);
    return $result;
}
