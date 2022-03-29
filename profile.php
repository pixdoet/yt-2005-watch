<?php
require __DIR__ . "/vendor/autoload.php";

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . "/templates");
$twig = new Environment($loader);

include("includes/youtubei/browse.php");
include("includes/config.inc.php");

if (!isset($_GET['id'])) {
    echo "Please enter a channel ID";
} else {
    $id = $_GET['id'];
    $mainResponseObject = json_decode(requestChannel($id, "about"));
    // check for some channels that are "special" in that they dont have the date as other channels would normally do.
    if (isset($mainResponseObject->contents->twoColumnBrowseResultsRenderer->tabs[4]->tabRenderer->content->sectionListRenderer->contents[0]->itemSectionRenderer->contents[0]->channelAboutFullMetadataRenderer)) {
        $metadata = $mainResponseObject->contents->twoColumnBrowseResultsRenderer->tabs[4]->tabRenderer->content->sectionListRenderer->contents[0]->itemSectionRenderer->contents[0]->channelAboutFullMetadataRenderer;
        $cDetails = array(
            "name" => $metadata->title->simpleText,
            "description" => $metadata->description->simpleText,
            "thumbnail" => $metadata->avatar->thumbnails[0]->url,
            "joined" => $metadata->joinedDateText->runs[1]->text, // currently not implemented, will find some way to add in this shit
            "rss" => "https://www.youtube.com/feeds/videos.xml?channel_id=" . $id,
        );
    } else {
        $metadata = $mainResponseObject->metadata->channelMetadataRenderer;
        $cDetails = array(
            "name" => $metadata->title,
            "description" => $metadata->description,
            "thumbnail" => $metadata->avatar->thumbnails[0]->url,
            "joined" => "N/A", //$metadata->joinedDateText->runs[1]->text,
            "rss" => "https://www.youtube.com/feeds/videos.xml?channel_id=" . $id,
        );
    }

    echo $twig->render(
        "profile.html.twig",
        [
            "id" => $id,
            "name" => $cDetails['name'],
            "description" => $cDetails['description'],
            "rss" => $cDetails['rss']
        ]
    );
}
    // ok now go to the HTML section below........
