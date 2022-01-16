<?php
include('../includes/youtubei/createRequest.php');

header("Content-type: application/json");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mainResponseObject = json_decode(requestChannel($id,"about"));
    if ($mainResponseObject) {
        // horror :O
        $metadata = $mainResponseObject->contents->twoColumnBrowseResultsRenderer->tabs[4]->tabRenderer->content->sectionListRenderer->contents[0]->itemSectionRenderer->contents[0]->channelAboutFullMetadataRenderer;

        $response = array(
            "name" => $metadata->title->simpleText,
            "description" => $metadata->description->simpleText,
            "thumbnail" => $metadata->avatar->thumbnails[0]->url,
            "joined" => $metadata->joinedDateText->runs[1]->text,
            "rss" => "https://www.youtube.com/feeds/videos.xml?channel_id=".$id,
        );
        echo json_encode($response);
    }
}
else
{
    $response = array(
        "error" => "No channel id",
        "errorCode" => 1,
        "errorType" => 0,
        "responseCode" => 1,
        "success" => false,
    );
    echo json_encode($response);
}
