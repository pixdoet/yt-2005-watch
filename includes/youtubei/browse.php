<?php
/*
 * Browse.php - requests channel and homepages, among others
 * 
 * @author Ian Hiew (pixdo.et@gmail.com)
*/

function requestBrowse($brid)
{
    include("includes/config.inc.php");
    $req_arr = json_encode(
        array(
            'context' =>
            array(
                'client' =>
                array(
                    'visitorData' => 'Cgtjc1hsUzJrS2tlWSiBnYaNBg%3D%3D',
                    'userAgent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:94.0) Gecko/20100101 Firefox/94.0,gzip(gfe)',
                    'clientName' => 'WEB',
                    'clientVersion' => '2.20211124.00.00',
                    'mainAppWebInfo' =>
                    array(
                        'graftUrl' => '/feed/subscriptions',
                    ),
                ),
            ),
            'browseId' => $brid,
        )
    );

    // echo $brid;  // left this in oops
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
                    'userAgent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:94.0) Gecko/20100101 Firefox/94.0,gzip(gfe)',
                    'clientName' => 'WEB',
                    'clientVersion' => '2.20211124.00.00',
                    'mainAppWebInfo' =>
                    array(
                        'graftUrl' => '/feed/subscriptions',
                    ),
                ),
            ),
            'browseId' => $channelId,
            'params' => $brEp,
        )
    );

    // echo $brid;  // left this in oops
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
