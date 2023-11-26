<?php

function requestDetails($videoId)
{
  /**
   * requestDetails - request `next` for better source of video details
   * *all video details are to be sourced from here*
   * 
   * @author Ian Hiew(pixdo.et@gmail.com)
   * @param string $videoId - the video id to fetch `player` for
   */
  include_once("includes/config.inc.php");
  $req_arr = json_encode(
    array(
      'context' =>
      array(
        'client' =>
        array(
          'hl' => 'en',
          'clientName' => 'WEB',
          'clientVersion' => '2.20231026.03.01',
          'originalUrl' => 'https://www.youtube.com/watch?v=' . $videoId,
        )
      ),
      'videoId' => $videoId,
      'racyCheckOk' => true,
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
  curl_setopt($ch, CURLOPT_USERAGENT, INNERTUBE_REQUEST_USER_AGENT);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/next?key=" . INNERTUBE_REQUEST_API_KEY);

  $result = curl_exec($ch);
  return $result;
}
