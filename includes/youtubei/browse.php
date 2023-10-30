<?php

/** 
 * Browse.php - requests channel and homepages, among others
 * 
 * @author Ian Hiew (pixdo.et@gmail.com)
 */

function requestBrowse($brid)
{
    /**
     * requestBrowse - requests `browse` endpoint from InnerTube
     * 
     * @author Ian Hiew (pixdo.et@gmail.com)
     * 
     * @param string $brid - requests with a "Browse ID"
     */
    include_once("includes/config.inc.php");
    $req_arr = json_encode(
        array(
            'context' =>
            array(
                'client' =>
                array(
                    'visitorData' => 'Cgtjc1hsUzJrS2tlWSiBnYaNBg%3D%3D',
                    'userAgent' => INNERTUBE_REQUEST_USER_AGENT,
                    'clientName' => 'WEB',
                    'clientVersion' => INNERTUBE_CONTEXT_CLIENT_VERSION,
                    'mainAppWebInfo' =>
                    array(
                        'graftUrl' => '/feed/subscriptions',
                    ),
                ),
            ),
            'browseId' => $brid,
        )
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "X-Goog-AuthUser: 0",
        "X-Origin: https://www.youtube.com"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
    curl_setopt($ch, CURLOPT_USERAGENT, INNERTUBE_REQUEST_USER_AGENT);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/browse?key=") . INNERTUBE_REQUEST_API_KEY;

    $result = curl_exec($ch);
    return $result;
}
function requestChannel($channelId, $type)
{
    /**
     * requestChannel - basically requestBrowse but with channel stuff
     * 
     * @param string $channelId - the channel/user ID. eg: UC0ifhOnVBCUkpS-_FhcgQEQ (must add UC)
     * @param string $type - the type of data needed, based on the continuations provided.
     */

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
    include_once("includes/config.inc.php");
    $req_arr = json_encode(
        array(
            'context' =>
            array(
                'client' =>
                array(
                    'visitorData' => 'Cgtjc1hsUzJrS2tlWSiBnYaNBg%3D%3D',
                    'userAgent' => INNERTUBE_REQUEST_USER_AGENT,
                    'clientName' => 'WEB',
                    'clientVersion' => INNERTUBE_CONTEXT_CLIENT_VERSION,
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
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "X-Goog-AuthUser: 0",
        "X-Origin: https://www.youtube.com"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
    curl_setopt($ch, CURLOPT_USERAGENT, INNERTUBE_REQUEST_USER_AGENT);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/browse?key=" . INNERTUBE_REQUEST_API_KEY);

    $result = curl_exec($ch);
    return $result;
}
