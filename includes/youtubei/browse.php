<?php
include("/Users/pixdoet/Code/html/youtubei_play/includes/config.inc.php");
function requestBrowse($brid)
{
    include("createObject.php");
    if (isset($brid)) {
        $browseid = $brid;
    } else {
        $browseid = "FEBrowse";
    }
    $browseobject = createBrowseObject($browseid);
    // echo $browseobject;
    return $browseobject;
}
requestBrowse('UC-9-kyTW8ZkZNDHQJ6FgpwQ');