<?php
function requestSearch($query)
{
    /**
     * requestSearch - requests InnerTube `search` then returns the results
     * 
     * @author Ian Hiew(pixdo.et@gmail.com)
     * 
     * @param string $query - the query to search for
     */

    // endpoint: /youtube1/v1/search
    include("includes/config.inc.php");
    $req_arr = json_encode(array(
        'context' =>
        array(
            'client' =>
            array(
                'visitorData' => 'Cgtjc1hsUzJrS2tlWSj0752NBg%3D%3D',
                'clientName' => 'WEB',
                'clientVersion' => $INNERTUBE_CONTEXT_CLIENT_VERSION,
                'originalUrl' => 'https://www.youtube.com/results?search_query=' . $query,
                'mainAppWebInfo' =>
                array(
                    'graftUrl' => '/results?search_query=' . $query,
                ),
            ),
        ),
        'query' => $query,
        'webSearchboxStatsUrl' => '/search?oq=' . $query . '&gs_l=youtube.3...533.1044.0.1153.7.5.0.0.0.0.0.0..0.0....0...1ac.1.64.youtube..7.0.0....0.',
    ));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "X-Goog-AuthUser: 0",
        "X-Origin: https://www.youtube.com"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
    curl_setopt($ch, CURLOPT_USERAGENT, $INNERTUBE_REQUEST_USER_AGENT);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/search?key=" . $INNERTUBE_REQUEST_API_KEY);

    $result = curl_exec($ch);
    return $result;
}
