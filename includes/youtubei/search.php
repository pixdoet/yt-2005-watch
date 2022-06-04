<?php
function requestSearch($query)
{
    // endpoint: /youtube1/v1/search
    /*
        Search functions using youtubei.
        Otherwise, the site is basically unusable :him:
    */
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

    $ua = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:100.0) Gecko/20100101 Firefox/100.0";
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIEFILE, "../../cookies.txt");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
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
