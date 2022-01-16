<?php
include("includes/youtubei/createRequest.php");

// set JSON header
header("Content-type: application/json; charset=utf-8");

if (isset($_GET['v'])) {
    $id = $_GET['v'];

    $mainResponseObject = json_decode(requestPlayer($id));

    $response = array(
        "videoId" => $id,
        "videoDetails" => array(
            "videoTitle" => $mainResponseObject->videoDetails->title,
            "videoDescription" => 'None',
            "videoLengthInSeconds" => $mainResponseObject->videoDetails->lengthSeconds,
            "videoLengthFormatted" => gmdate("i:s", $mainResponseObject->videoDetails->lengthSeconds),
            "videoRuntime" => gmdate("i:s", $mainResponseObject->videoDetails->lengthSeconds),
            "videoViews" => $mainResponseObject->videoDetails->viewCount,
            "videoAuthor" => $mainResponseObject->microformat->playerMicroformatRenderer->ownerChannelName,
            "videoUploadDate" => $mainResponseObject->microformat->playerMicroformatRenderer->uploadDate,
            "videoThumbnail" => $mainResponseObject->microformat->playerMicroformatRenderer->thumbnail->thumbnails[0]->url
        ),
        "videoSrc" => array(
            "hasVideoSrc" => false,
            "videoSrcHtml" => sprintf('Video unavailable for playback. <a href="https://youtube.com/watch?v=%s">Watch on YouTube</a>', $id)
        ),
        "recommendedVideos" => array(
            1 => array(
                "videoTitle" => "Funny",
                "videoId" => "dQw471Gwx",
            ),
        ),
        "responseCode" => 0,
        "success" => true
    );
    // aftermath
    if (isset($mainResponseObject->microformat->playerMicroformatRenderer->description->simpleText)) {
        $response['videoDetails']['videoDescription'] = $mainResponseObject->microformat->playerMicroformatRenderer->description->simpleText;
    }
    if (isset($mainResponseObject->streamingData->formats[0]->url)) {
        $response['videoSrc']['videoSrc'] = $mainResponseObject->streamingData->formats[0]->url;
        $response['videoSrc']['hasVideoSrc'] = true;
        $response['videoSrc']['videoSrcHtml'] = sprintf('<video controls src="%s">', $mainResponseObject->streamingData->formats[0]->url);
    }
} else {
    $response = array(
        "error" => "No video id",
        "errorType" => 0,
        "responseCode" => 1,
        "success" => false
    );
}
// return everything into JSON
echo json_encode($response);
