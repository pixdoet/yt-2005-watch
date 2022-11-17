<?php
// watch.php for watching videos

// init twig services
require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

include("includes/youtubei/player.php");
include("includes/youtubei/comments.php");

if (!isset($_GET['v'])) {
    echo $twig->render(
        "novideo.html.twig",
        [
            "id" => "#",
        ]
    );
} else {
    $id = $_GET['v'];

    // request player :hsuk:
    $response_object = requestPlayer($id);
    $mainResponseObject = json_decode($response_object);

    // check if video exists
    if (!isset($mainResponseObject->videoDetails->title)) {
        echo $twig->render(
            "novideo.html.twig",
            [
                "id" => $id,
            ]
        );
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
                $tags = array(0 => "None");
            }
        } else {
            $tagcount = 0;
            $tags = array(0 => "None");
        }

        // video source file
        if (requestVideoSrc($id)) {
            $videoLink = requestVideoSrc($id);
            $videoHtml = sprintf('<video controls class="video-player googlevideo-player" style="width: 427px; height: margin:center;" src="%s"></video>', $videoLink);
        } else {
            $videoHtml = sprintf('<span class="noVideoError">Video unavailable for playback. <a href="https://youtube.com/watch?v=%s">Watch on YouTube</a></span>', $id);
        }

        // fetch comments into an array...
        $initialResponseContext = json_decode(fetchInitialNext($id));
        if (isset($initialResponseContext->contents->twoColumnWatchNextResults->results->results->contents[3])) {
            $hasComments = true;
            $continuation = $initialResponseContext
                ->contents
                ->twoColumnWatchNextResults
                ->results
                ->results
                ->contents[3]
                ->itemSectionRenderer
                ->contents[0]
                ->continuationItemRenderer
                ->continuationEndpoint
                ->continuationCommand
                ->token;
            // fetch the comments
            $mainResponseContext = json_decode(fetchComment($id, $continuation));
            $commentsArray = $mainResponseContext->onResponseReceivedEndpoints[1]->reloadContinuationItemsCommand->continuationItems;
            // start writing to twiG
        } else {
            $hasComments = false;
        }

        // get related videos...
        $relatedResponse = json_decode(fetchInitialNext($id));
        if (isset($relatedResponse->contents->twoColumnWatchNextResults->secondaryResults->secondaryResults->results)) {
            $hasRelated = true;
            $relatedArray = $relatedResponse
                ->contents
                ->twoColumnWatchNextResults
                ->secondaryResults
                ->secondaryResults
                ->results;
        } else {
            $hasRelated = false;
        }
        // add check for native player GET param
        if (isset($_GET['useNative'])) {
            if ($_GET['useNative']) {
                $useNativePlayer = true;
            } else {
                $useNativePlayer = false;
            }
        } else {
            $useNativePlayer = false;
        }
        if (isset($_GET['2012']) && $_GET['2012'] == "1") {
            echo $twig->render(
                "watch2012.html.twig",
                [
                    "videoId" => $id,
                    "videoHtml" => $videoHtml,
                    "videoSrc" => $videoLink,
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
        } else {
            $dataArray = [
                "videoId" => $id,
                "videoHtml" => $videoHtml,
                "videoSrc" => $videoLink,
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
                "hasComments" => $hasComments,
                "hasRelated" => $hasRelated,
                "useNativePlayer" => $useNativePlayer,
            ];
            if ($hasComments) {
                $dataArray['videoComments'] = $commentsArray;
            }
            if ($hasRelated) {
                $dataArray['videoRelated'] = $relatedArray;
                $dataArray['videoRelatedCount'] = sizeof($relatedArray) - 1;
            }
            echo $twig->render("watch.html.twig", $dataArray);
        }
    }
}
