<?php
// functions for creating various data needed to request youtubei :hiM:

// read functions
function requestBrowse($brid)
{
  // endpoint: /youtubei/v1/browse

  /* 
    This is the main, and most important youtubei endpoint that we need.
    Browse requests data such as video suggestions, channel videos and 
    subscriptions, among other useful stuff that, when PBJ was still used,
    was seperated into tons of different endpoints.

    Depending on the "browse id", this section can either require or dont 
    require a SAPISID to return data. We'll assume everything here needs
    it tho since doing stuff seperately is annoying as fuck.

    This PHP function takes one argument, $brid, which is the "browse id"
    mentioned earlier in the description. I'll leave everything about this
    in the documentation that's horribly out of date and probably not going 
    to exist.
  */
  include("../includes/config.inc.php");
  $req_arr = json_encode(
    array(
      'context' =>
      array(
        'client' =>
        array(
          'hl' => 'en',
          'gl' => 'MY',
          'remoteHost' => '2001:e68:5418:cf5d:9daa:1106:dd70:103e',
          'deviceMake' => 'Apple',
          'deviceModel' => '',
          'visitorData' => 'Cgtjc1hsUzJrS2tlWSiBnYaNBg%3D%3D',
          'userAgent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:94.0) Gecko/20100101 Firefox/94.0,gzip(gfe)',
          'clientName' => 'WEB',
          'clientVersion' => '2.20211124.00.00',
          'osName' => 'Macintosh',
          'osVersion' => '10.14',
          'originalUrl' => 'https://www.youtube.com/feed/explore',
          'platform' => 'DESKTOP',
          'clientFormFactor' => 'UNKNOWN_FORM_FACTOR',
          'configInfo' =>
          array(
            'appInstallData' => 'CIGdho0GELDUrQUQl-qtBRCT6q0FEJLXrQUQt8utBRCU_vwSENi-rQUQkfj8Eg%3D%3D',
          ),
          'userInterfaceTheme' => 'USER_INTERFACE_THEME_DARK',
          'timeZone' => 'Asia/Kuala_Lumpur',
          'browserName' => 'Firefox',
          'browserVersion' => '94.0',
          'screenWidthPoints' => 1438,
          'screenHeightPoints' => 889,
          'screenPixelDensity' => 1,
          'screenDensityFloat' => 1,
          'utcOffsetMinutes' => 480,
          'mainAppWebInfo' =>
          array(
            'graftUrl' => '/feed/subscriptions',
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
          'clickTrackingParams' => 'CGUQtSwYAiITCKzE2sa2t_QCFcj8OAYdOUsJuA==',
        ),
        'adSignalsInfo' =>
        array(
          'params' =>
          array(
            0 =>
            array(
              'key' => 'dt',
              'value' => '1637977730876',
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
              'value' => '1',
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
              'value' => '974',
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
              'value' => '889',
            ),
            12 =>
            array(
              'key' => 'biw',
              'value' => '1423',
            ),
            13 =>
            array(
              'key' => 'brdim',
              'value' => '0,23,0,23,1920,23,1920,974,1438,889',
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

// endpoint: /youtubei/v1/player
function requestPlayer($videoId)
{
  include("../includes/config.inc.php");
  $req_arr = json_encode(
    array(
      'context' =>
      array(
        'client' =>
        array(
          'hl' => 'en',
          'gl' => 'MY',
          'remoteHost' => '2001:e68:5418:cf5d:d4c0:8673:d2fb:91fd',
          'deviceMake' => 'Apple',
          'deviceModel' => '',
          'visitorData' => 'Cgtjc1hsUzJrS2tlWSjImoiNBg%3D%3D',
          'userAgent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:94.0) Gecko/20100101 Firefox/94.0,gzip(gfe)',
          'clientName' => 'WEB',
          'clientVersion' => '2.20211124.00.00',
          'osName' => 'Macintosh',
          'osVersion' => '10.14',
          'originalUrl' => 'https://www.youtube.com/watch?v=' . $videoId,
          'platform' => 'DESKTOP',
          'clientFormFactor' => 'UNKNOWN_FORM_FACTOR',
          'configInfo' =>
          array(
            'appInstallData' => 'CMiaiI0GEJPqrQUQsNStBRCX6q0FEJLXrQUQt8utBRCU_vwSEJH4_BIQ2L6tBQ%3D%3D',
          ),
          'userInterfaceTheme' => 'USER_INTERFACE_THEME_DARK',
          'timeZone' => 'Asia/Kuala_Lumpur',
          'browserName' => 'Firefox',
          'browserVersion' => '94.0',
          'screenWidthPoints' => 1345,
          'screenHeightPoints' => 889,
          'screenPixelDensity' => 1,
          'screenDensityFloat' => 1,
          'utcOffsetMinutes' => 480,
          'clientScreen' => 'WATCH',
          'mainAppWebInfo' =>
          array(
            'graftUrl' => '/watch?v=' . $videoId,
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
          'clickTrackingParams' => 'CMYDENwwIhMIsamoua-49AIVlI7YBR2xTAlhMgpnLWhpZ2gtcmVjWg9GRXdoYXRfdG9fd2F0Y2iaAQYQjh4YngE=',
        ),
        'adSignalsInfo' =>
        array(
          'params' =>
          array(
            0 =>
            array(
              'key' => 'dt',
              'value' => '1638010185450',
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
              'value' => '974',
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
              'value' => '889',
            ),
            12 =>
            array(
              'key' => 'biw',
              'value' => '1330',
            ),
            13 =>
            array(
              'key' => 'brdim',
              'value' => '0,23,0,23,1920,23,1920,974,1345,889',
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
      'videoId' => $videoId,
      'playbackContext' =>
      array(
        'contentPlaybackContext' =>
        array(
          'currentUrl' => '/watch?v=' . $videoId,
          'vis' => 0,
          'splay' => false,
          'autoCaptionsDefaultOn' => true,
          'autonavState' => 'STATE_OFF',
          'html5Preference' => 'HTML5_PREF_WANTS',
          'signatureTimestamp' => 18954,
          'referer' => 'https://www.youtube.com/',
          'lactMilliseconds' => '-1',
        ),
      ),
      'racyCheckOk' => false,
      'contentCheckOk' => false,
    )
  );
  $ch = curl_init();
  // otherwise unsupported browser
  $ua = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:100.0) Gecko/20100101 Firefox/100.0";
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // so that the 1 doesnt show
  curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: ", //sapisidhash,
    "Content-Type: application/json",
    // "Referer: https://youtube.com/watch?v=" . $videoId,
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

function requestChannel($channelId,$type)
{
  // first get browse endpoints, form a request to normal browse
  $getEp = json_decode(requestBrowse($channelId));
  if($getEp)
  {
    $ep = $getEp->contents->twoColumnBrowseResultsRenderer->tabs;
    switch($type)
    {
      case "videos":
        $brEp = $ep[1]->tabRenderer->endpoint->browseEndpoint->params;
        break;
      case "channels":
        $brEp = $ep[3]->tabRenderer->endpoint->browseEndpoint->params;
        break;
      case "about":
        $brEp = $ep[4]->tabRenderer->endpoint->browseEndpoint->params;
        break;
      default:
        $brEp = $ep[4]->tabRenderer->endpoint->browseEndpoint->params;
        break;
    }
  }
  // more advanced functions for browse
  include("../includes/config.inc.php");
  $req_arr = json_encode(
    array(
      'context' =>
      array(
        'client' =>
        array(
          'hl' => 'en',
          'gl' => 'MY',
          'remoteHost' => '2001:e68:5418:cf5d:9daa:1106:dd70:103e',
          'deviceMake' => 'Apple',
          'deviceModel' => '',
          'visitorData' => 'Cgtjc1hsUzJrS2tlWSiBnYaNBg%3D%3D',
          'userAgent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:94.0) Gecko/20100101 Firefox/94.0,gzip(gfe)',
          'clientName' => 'WEB',
          'clientVersion' => '2.20211124.00.00',
          'osName' => 'Macintosh',
          'osVersion' => '10.14',
          'originalUrl' => 'https://www.youtube.com/feed/explore',
          'platform' => 'DESKTOP',
          'clientFormFactor' => 'UNKNOWN_FORM_FACTOR',
          'configInfo' =>
          array(
            'appInstallData' => 'CIGdho0GELDUrQUQl-qtBRCT6q0FEJLXrQUQt8utBRCU_vwSENi-rQUQkfj8Eg%3D%3D',
          ),
          'userInterfaceTheme' => 'USER_INTERFACE_THEME_DARK',
          'timeZone' => 'Asia/Kuala_Lumpur',
          'browserName' => 'Firefox',
          'browserVersion' => '94.0',
          'screenWidthPoints' => 1438,
          'screenHeightPoints' => 889,
          'screenPixelDensity' => 1,
          'screenDensityFloat' => 1,
          'utcOffsetMinutes' => 480,
          'mainAppWebInfo' =>
          array(
            'graftUrl' => '/feed/subscriptions',
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
          'clickTrackingParams' => 'CGUQtSwYAiITCKzE2sa2t_QCFcj8OAYdOUsJuA==',
        ),
        'adSignalsInfo' =>
        array(
          'params' =>
          array(
            0 =>
            array(
              'key' => 'dt',
              'value' => '1637977730876',
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
              'value' => '1',
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
              'value' => '974',
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
              'value' => '889',
            ),
            12 =>
            array(
              'key' => 'biw',
              'value' => '1423',
            ),
            13 =>
            array(
              'key' => 'brdim',
              'value' => '0,23,0,23,1920,23,1920,974,1438,889',
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
      'browseId' => $channelId,
      'params' => $brEp,
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

function requestSearch($query)
{  
  // endpoint: /youtube1/v1/search
  /*
    Search functions using youtubei.
    Otherwise, the site is basically unusable :him:
  */
  include("../includes/config.inc.php");
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
