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
                'hl' => 'en',
                'gl' => 'MY',
                'remoteHost' => '180.74.66.22',
                'deviceMake' => 'Apple',
                'deviceModel' => '',
                'visitorData' => 'Cgtjc1hsUzJrS2tlWSj0752NBg%3D%3D',
                'userAgent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:94.0) Gecko/20100101 Firefox/94.0,gzip(gfe)',
                'clientName' => 'WEB',
                'clientVersion' => '2.20211129.09.00',
                'osName' => 'Macintosh',
                'osVersion' => '10.14',
                'originalUrl' => 'https://www.youtube.com/results?search_query=' . $query,
                'platform' => 'DESKTOP',
                'clientFormFactor' => 'UNKNOWN_FORM_FACTOR',
                'configInfo' =>
                array(
                    'appInstallData' => 'CPTvnY0GELfLrQUQsNStBRCS160FEJfqrQUQlP78EhDYvq0FEJH4_BI%3D',
                ),
                'userInterfaceTheme' => 'USER_INTERFACE_THEME_DARK',
                'timeZone' => 'Asia/Kuala_Lumpur',
                'browserName' => 'Firefox',
                'browserVersion' => '94.0',
                'screenWidthPoints' => 1345,
                'screenHeightPoints' => 890,
                'screenPixelDensity' => 1,
                'screenDensityFloat' => 1,
                'utcOffsetMinutes' => 480,
                'mainAppWebInfo' =>
                array(
                    'graftUrl' => '/results?search_query=' . $query,
                    'webDisplayMode' => 'WEB_DISPLAY_MODE_BROWSER',
                    'isWebNativeShareAvailable' => false,
                ),
            ),
            'user' =>
            array(
                'lockedSafetyMode' => false,
            ),
            'request' =>
            array(
                'useSsl' => true,
                'internalExperimentFlags' =>
                array(),
                'consistencyTokenJars' =>
                array(),
            ),
            'clickTracking' =>
            array(
                'clickTrackingParams' => 'CB0Q7VAiEwimvoXx2cL0AhXcQQ8CHTmdAE8=',
            ),
            'adSignalsInfo' =>
            array(
                'params' =>
                array(
                    0 =>
                    array(
                        'key' => 'dt',
                        'value' => '1638365174421',
                    ),
                    1 =>
                    array(
                        'key' => 'flash',
                        'value' => '0',
                    ),
                    2 =>
                    array(
                        'key' => 'frm',
                        'value' => '0',
                    ),
                    3 =>
                    array(
                        'key' => 'u_tz',
                        'value' => '480',
                    ),
                    4 =>
                    array(
                        'key' => 'u_his',
                        'value' => '2',
                    ),
                    5 =>
                    array(
                        'key' => 'u_h',
                        'value' => '1080',
                    ),
                    6 =>
                    array(
                        'key' => 'u_w',
                        'value' => '1920',
                    ),
                    7 =>
                    array(
                        'key' => 'u_ah',
                        'value' => '975',
                    ),
                    8 =>
                    array(
                        'key' => 'u_aw',
                        'value' => '1920',
                    ),
                    9 =>
                    array(
                        'key' => 'u_cd',
                        'value' => '24',
                    ),
                    10 =>
                    array(
                        'key' => 'bc',
                        'value' => '31',
                    ),
                    11 =>
                    array(
                        'key' => 'bih',
                        'value' => '890',
                    ),
                    12 =>
                    array(
                        'key' => 'biw',
                        'value' => '1330',
                    ),
                    13 =>
                    array(
                        'key' => 'brdim',
                        'value' => '0,23,0,23,1920,23,1920,975,1345,890',
                    ),
                    14 =>
                    array(
                        'key' => 'vis',
                        'value' => '1',
                    ),
                    15 =>
                    array(
                        'key' => 'wgl',
                        'value' => 'true',
                    ),
                    16 =>
                    array(
                        'key' => 'ca_type',
                        'value' => 'image',
                    ),
                ),
            ),
        ),
        'query' => $query,
        'webSearchboxStatsUrl' => '/search?oq=' . $query . '&gs_l=youtube.3...533.1044.0.1153.7.5.0.0.0.0.0.0..0.0....0...1ac.1.64.youtube..7.0.0....0.',
    ));
    $ch = curl_init();

    $ua = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:100.0) Gecko/20100101 Firefox/100.0"; // otherwise unsupported browser
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
