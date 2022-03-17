<?php
// watch.php for watching videos

// init twig services
require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

include("includes/youtubei/createRequest.php");

if (!isset($_GET['v'])) {
    include('includes/html/novideo.php');
} else {
    $id = $_GET['v'];

    // request player :hsuk:
    $response_object = requestPlayer($id);
    $mainResponseObject = json_decode($response_object);

    // check if video exists
    if (!isset($mainResponseObject->videoDetails->title)) {
        include('includes/novideo.php');
    } else {
        $videoDetails = array(
            "videoTitle" => $mainResponseObject->videoDetails->title,
            "videoDescription" => '<span class="redtext"><i>No description</i></span>', // due for modification later
            "videoLengthInSeconds" => $mainResponseObject->videoDetails->lengthSeconds,
            "videoViews" => $mainResponseObject->videoDetails->viewCount,
            "videoAuthor" => $mainResponseObject->microformat->playerMicroformatRenderer->ownerChannelName,
            "videoUploadDate" => $mainResponseObject->microformat->playerMicroformatRenderer->uploadDate,
            "videoRuntime" => $mainResponseObject->microformat->playerMicroformatRenderer->lengthSeconds,
            "videoThumbnail" => $mainResponseObject->microformat->playerMicroformatRenderer->thumbnail->thumbnails[0]->url,
            "authorChannelId" => $mainResponseObject->microformat->playerMicroformatRenderer->externalChannelId,
            "videoConvertedRuntime" => gmdate("i:s", $mainResponseObject->microformat->playerMicroformatRenderer->lengthSeconds),
        );

        // replace description text if description exists
        if (isset($mainResponseObject->microformat->playerMicroformatRenderer->description->simpleText)) {
            $videoDetails['videoDescription'] = $mainResponseObject->microformat->playerMicroformatRenderer->description->simpleText;
        }

        // get video tags(annoying)
        if (isset($mainResponseObject->videoDetails->keywords)) {
            $tagarr = $mainResponseObject->videoDetails->keywords;
            $tagcount = sizeof($tagarr);
            if ($tagcount >= 1) {
                $tags = $tagarr;
            } else {
                $tags = array("None");
            }
        } else {
            $tagcount = 0;
        }

        // video source file
        if (isset($mainResponseObject->streamingData->formats[0]->url)) {
            // generate video tag HTML
            $videoHtml = sprintf('<video controls src="%s" class="has-video googlevideo" style="width: 427px; height: margin:center;">', $mainResponseObject->streamingData->formats[0]->url);
        } else {
            // generate error text HTML
            $videoHtml = sprintf('<span class="noVideoError">Video unavailable for playback. <a href="https://youtube.com/watch?v=%s">Watch on YouTube</a></span>', $id);
        }

        // start writing to twiG

        echo $twig->render(
            "watch.html.twig",
            [
                "videoId" => $id,
                "videoHtml" => $videoHtml,
                "videoTags" => $tags,
                "videoDescription" => $videoDetails['videoDescription'],
                "videoTitle" => $videoDetails['videoTitle'],
                "videoViews" => $videoDetails['videoViews'],
                "videoAuthor" => $videoDetails['videoAuthor'],
                "videoUploadDate" => $videoDetails['videoUploadDate'],
                "videoRuntime" => $videoDetails['videoRuntime'],
                "videoThumbnail" => $videoDetails['videoThumbnail'],
                "authorChannelId" => $videoDetails['authorChannelId'],
                "videoConvertedRuntime" => $videoDetails['videoConvertedRuntime'],
            ]
        );
    }
}
