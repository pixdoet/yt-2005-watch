<?php
// watch.php for watching videos

// init twig services
require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

include("includes/youtubei/details.php");
include("includes/youtubei/player.php");
include("includes/youtubei/comments.php");
include_once("includes/config.inc.php");

// debug flag
if (isset(($_GET['debug']))) {
    if ($_GET['debug'] == $debugCode) {
        $debug = true;
    }
} else {
    $debug = false;
}

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
    $response_object = requestDetails($id);
    $mainResponseObject = json_decode($response_object);
    $playerObject = json_decode(requestPlayer($id));

    // check if video exists
    if (!isset($mainResponseObject->contents->twoColumnWatchNextResults->results->results->contents[0]->videoPrimaryInfoRenderer->title->runs[0]->text)) {
        echo $twig->render(
            "novideo.html.twig",
            [
                "id" => $id,
            ]
        );
    } else {
        $videoDetails = array(
            "videoTitle" => $mainResponseObject->contents->twoColumnWatchNextResults->results->results->contents[0]->videoPrimaryInfoRenderer->title->runs[0]->text,
            "videoDescription" => '<span class="redtext"><i>No description</i></span>', // due for modification later
            "videoLengthInSeconds" => $playerObject->videoDetails->lengthSeconds,
            "videoViews" => $mainResponseObject->contents->twoColumnWatchNextResults->results->results->contents[0]->videoPrimaryInfoRenderer->viewCount->videoViewCountRenderer->viewCount->simpleText,
            "videoAuthor" => $mainResponseObject->contents->twoColumnWatchNextResults->results->results->contents[1]->videoSecondaryInfoRenderer->owner->videoOwnerRenderer->title->runs[0]->text,
            "videoUploadDate" => $mainResponseObject->contents->twoColumnWatchNextResults->results->results->contents[0]->videoPrimaryInfoRenderer->dateText->simpleText,
            "videoRuntime" => $playerObject->microformat->playerMicroformatRenderer->lengthSeconds,
            "videoThumbnail" => $playerObject->contents->twoColumnWatchNextResults->results->results->contents[0]->videoPrimaryInfoRenderer->title->runs[0]->text,
            "authorChannelId" => $mainResponseObject->contents->twoColumnWatchNextResults->results->results->contents[1]->videoSecondaryInfoRenderer->owner->videoOwnerRenderer->title->runs[0]->navigationEndpoint->browseEndpoint->browseId,
            "videoConvertedRuntime" => gmdate("i:s", $playerObject->microformat->playerMicroformatRenderer->lengthSeconds),
        );

        // replace description text if description exists
        if (isset($mainResponseObject->contents->twoColumnWatchNextResults->results->results->contents[1]->videoSecondaryInfoRenderer->attributedDescription->content)) {
            $videoDetails['videoDescription'] = $mainResponseObject->contents->twoColumnWatchNextResults->results->results->contents[1]->videoSecondaryInfoRenderer->attributedDescription->content;
        }

        // get video tags(annoying)
        if (isset($playerObject->videoDetails->keywords)) {
            $tagarr = $playerObject->videoDetails->keywords;
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
            if ($debug) {
                echo $videoLink;
            }
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
            $commentCount = $mainResponseObject->contents->twoColumnWatchNextResults->results->results->contents[2]->itemSectionRenderer->contents[0]->commentsEntryPointHeaderRenderer->commentCount->simpleText;
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
            if ($_GET['useNative'] == true) {
                setcookie("useNative", true, time() + (86400 * 30), "/");
                $useNativePlayer = true;
            } elseif ($_GET['useNative'] == false) {
                setcookie("useNative", false, time() + (86400 * 30), "/");
                $useNativePlayer = false;
            }
        } // else fallback to cookie

        // check for native player cookie
        if (isset($_COOKIE['useNative'])) {
            $nativeCookie = $_COOKIE['useNative'];
            if ($nativeCookie) {
                $useNativePlayer = true;
            } else {
                $useNativePlayer = false;
            }
        } else {
            $useNativePlayer = true;
        }

        // 2012 easter egg
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
                $dataArray['commentCount'] = $commentCount;
            }
            if ($hasRelated) {
                $dataArray['videoRelated'] = $relatedArray;
                $dataArray['videoRelatedCount'] = sizeof($relatedArray) - 1;
            }
            echo $twig->render("watch.html.twig", $dataArray);
        }
    }
}
