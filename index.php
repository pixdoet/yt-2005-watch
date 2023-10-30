<?php
// check if a video id is here.
if (isset($_GET['v'])) {
    header("Location: watch.php?v=" . $_GET['v']);
    die();
}

include("includes/youtubei/browse.php");

// form a youtubei request to /youtubei/v1/browse, then get the first 10 results
// we then fetch data with /youtube1/v1/player 
$response_object = requestBrowse("FEwhat_to_watch");

$response = json_decode($response_object);
function homepageFeed($number, $response)
{
    $feedobj = $response
        ->contents
        ->twoColumnBrowseResultsRenderer
        ->tabs[0]
        ->tabRenderer
        ->content
        ->richGridRenderer
        ->contents[$number];
    //print_r($feedobj);
    return $feedobj;
}
for ($i = 0; $i < 10; $i++) {
    // check if box is video 
    $obj = homepageFeed($i, $response);
    if (!isset($obj->richItemRenderer->content->videoRenderer)) {
        $obj = homepageFeed($i += 1, $response);
    } else {
        // create details array
        $obj_accessor = $obj->richItemRenderer->content->videoRenderer;
        $contents = array(
            "videoTitle" => $obj_accessor->title->runs[0]->text,
            "videoThumbnail" => $obj_accessor->thumbnail->thumbnails[0]->url,
            "videoId" => $obj_accessor->videoId,
            "videoDescription" => "<i>No description</i>",
            // "videoDescription" => $obj_accessor->descriptionSnippet->runs[0]->text,
            "videoRuntime" => $obj_accessor->lengthText->simpleText,
            "videoViewcount" => $obj_accessor->viewCountText->simpleText,
            "videoAuthor" => $obj_accessor->shortBylineText->runs[0]->text,
            "videoUploadDate" => $obj_accessor->publishedTimeText->simpleText,
            "authorChannelId" => $obj_accessor->shortBylineText->runs[0]->navigationEndpoint->browseEndpoint->browseId,
        );
        // check for videos without description
        if (isset($obj_accessor->descriptionSnippet->runs[0]->text)) {
            $obj_details["videoDescription"] = $obj_accessor->descriptionSnippet->runs[0]->text;
        }
    }
}
// ok we done now to the html section below...

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>YouTube - Your Digital Video Repository</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="yts/imgbin/favicon.ico" type="image/x-icon">
    <link href="yts/cssbin/styles.css" rel="stylesheet" type="text/css">
    <link rel="alternate" type="application/rss+xml" title="YouTube " recently="" added="" videos="" [rss]="" href="http://www.youtube.com/rss/global/recently_added.rss">
</head>

<body>

    <table width="800" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
            <tr>
                <td style="padding-bottom: 25px;" bgcolor="#FFFFFF">
                    <?php include("includes/html/header.php"); ?>

                    <div style="padding: 0px 5px 0px 5px;">


                        <table width="790" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody>
                                <tr valign="top">
                                    <td style="padding-right: 15px;">

                                        <table width="595" cellspacing="0" cellpadding="0" border="0" bgcolor="#E5ECF9" align="center">
                                            <tbody>
                                                <tr>
                                                    <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                    <td width="100%"><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                    <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                    <td style="padding: 5px 0px 10px 0px;">

                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr valign="top">
                                                                    <td style="border-right: 1px dashed #369; padding: 0px 10px 10px 10px; color: #444;" width="33%">
                                                                        <div style="font-size: 16px; font-weight: bold; margin-bottom: 5px;"><a href="my_videos_upload.php">Upload</a></div>
                                                                        Quickly upload and tag videos in almost any video format.
                                                                    </td>
                                                                    <td style="border-right: 1px dashed #369; padding: 0px 10px 10px 10px; color: #444;" width="33%">
                                                                        <div style="font-size: 16px; font-weight: bold; margin-bottom: 5px;"><a href="browse.php">Watch</a></div>
                                                                        Instantly find and watch 1000's of fast streaming videos.
                                                                    </td>
                                                                    <td style="padding: 0px 10px 10px 10px; color: #444;" width="33%">
                                                                        <div style="font-size: 16px; font-weight: bold; margin-bottom: 5px;"><a href="my_friends_invite.php">Share</a></div>
                                                                        Easily share your videos with family, friends, or co-workers.
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="yts/imgbin/box_login_bl.gif" width="5" height="5"></td>
                                                    <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                    <td><img src="yts/imgbin/box_login_br.gif" width="5" height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table><br>

                                        <table width="595" cellspacing="0" cellpadding="0" border="0" bgcolor="#CCCCCC" align="center">
                                            <tbody>
                                                <tr>
                                                    <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                    <td width="100%"><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                    <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                    <td width="585">
                                                        <div class="moduleTitleBar">
                                                            <div class="moduleTitle">
                                                                <div style="float: right; padding: 1px 5px 0px 0px; font-size: 12px;"><a href="browse.php">See More Videos</a></div>
                                                                Today's Featured Videos
                                                            </div>
                                                        </div>
                                                        <?php
                                                        for ($i = 0; $i < 8; $i++) {
                                                            // check if box is video 
                                                            $obj = homepageFeed($i, $response);
                                                            if (!isset($obj->richItemRenderer->content->videoRenderer)) {
                                                                $obj = homepageFeed($i += 1, $response);
                                                            } else {
                                                                // create details array
                                                                $obj_accessor = $obj->richItemRenderer->content->videoRenderer;
                                                                $obj_details = array(
                                                                    "videoTitle" => $obj_accessor->title->runs[0]->text,
                                                                    "videoThumbnail" => $obj_accessor->thumbnail->thumbnails[0]->url,
                                                                    "videoId" => $obj_accessor->videoId,
                                                                    "videoDescription" => "<i>No description</i>",
                                                                    // "videoDescription" => $obj_accessor->descriptionSnippet->runs[0]->text,
                                                                    "videoRuntime" => $obj_accessor->lengthText->simpleText,
                                                                    "videoViewcount" => $obj_accessor->viewCountText->simpleText,
                                                                    "videoAuthor" => $obj_accessor->shortBylineText->runs[0]->text,
                                                                    "videoUploadDate" => $obj_accessor->publishedTimeText->simpleText,
                                                                    "authorChannelId" => $obj_accessor->shortBylineText->runs[0]->navigationEndpoint->browseEndpoint->browseId,
                                                                );
                                                                // check for videos without description
                                                                if (isset($obj_accessor->descriptionSnippet->runs[0]->text)) {
                                                                    $obj_details["videoDescription"] = $obj_accessor->descriptionSnippet->runs[0]->text;
                                                                }
                                                        ?>

                                                                <div class="moduleEntry">
                                                                    <table width="565" cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                            <tr valign="top">
                                                                                <td><a href="watch.php?v=<?php echo $obj_details['videoId']; ?>"><img src="<?php echo $obj_details['videoThumbnail']; ?>" class="moduleEntryThumb" width="120" height="90"></a></td>
                                                                                <td width="100%">
                                                                                    <div class="moduleEntryTitle"><a href="watch.php?v=<?php echo $obj_details['videoId'] ?>"><?php echo $obj_details['videoTitle']; ?></a></div>
                                                                                    <div class="moduleEntryDescription"><?php echo $obj_details['videoDescription']; ?></div>
                                                                                    <div class="moduleEntryTags">
                                                                                        Tags // <a href="results.php?search=Martinez">Martinez</a> : <a href="results.php?search=Real">Real</a> : <a href="results.php?search=NorCal">NorCal</a> : <a href="results.php?search=Awesome">Awesome</a> : </div>
                                                                                    <div class="moduleEntryDetails">Added: <?php echo $obj_details['videoUploadDate']; ?> by <a href="profile.php?id=<?php echo $obj_details['authorChannelId']; ?>"><?php echo $obj_details['videoAuthor']; ?></a></div>
                                                                                    <div class="moduleEntryDetails">Views: <?php echo $obj_details['videoViewcount']; ?> | Comments: 0</div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                        <?php }
                                                        } ?>

                                                    </td>
                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="yts/imgbin/box_login_bl.gif" width="5" height="5"></td>
                                                    <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                    <td><img src="yts/imgbin/box_login_br.gif" width="5" height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </td>
                                    <td width="180">

                                        <table width="180" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFEEBB" align="center">
                                            <tbody>
                                                <tr>
                                                    <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                    <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                    <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                    <td width="170">

                                                        <div style="font-size: 16px; font-weight: bold; text-align: center; padding: 5px 5px 10px 5px;"><a href="signup.php">Sign up for your free account!</a></div>

                                                    </td>
                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="yts/imgbin/box_login_bl.gif" width="5" height="5"></td>
                                                    <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                    <td><img src="yts/imgbin/box_login_br.gif" width="5" height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div style="margin: 10px 0px 5px 0px; font-size: 12px; font-weight: bold; color: #333;">Recent Tags:</div>
                                        <div style="font-size: 13px; color: #333333;">


                                            <a style="font-size: 12px;" href="results.php?search=barbies">barbies</a> :


                                            <a style="font-size: 12px;" href="results.php?search=dar">dar</a> :


                                            <a style="font-size: 12px;" href="results.php?search=baby">baby</a> :


                                            <a style="font-size: 17px;" href="results.php?search=now">now</a> :


                                            <a style="font-size: 12px;" href="results.php?search=saint">saint</a> :


                                            <a style="font-size: 17px;" href="results.php?search=eat">eat</a> :


                                            <a style="font-size: 12px;" href="results.php?search=smash">smash</a> :


                                            <a style="font-size: 12px;" href="results.php?search=mensen">mensen</a> :


                                            <a style="font-size: 12px;" href="results.php?search=bko">bko</a> :


                                            <a style="font-size: 12px;" href="results.php?search=tara">tara</a> :


                                            <a style="font-size: 12px;" href="results.php?search=good">good</a> :


                                            <a style="font-size: 12px;" href="results.php?search=izquierda">izquierda</a> :


                                            <a style="font-size: 12px;" href="results.php?search=relax">relax</a> :


                                            <a style="font-size: 12px;" href="results.php?search=fiets">fiets</a> :


                                            <a style="font-size: 12px;" href="results.php?search=eenwielerke">eenwielerke</a> :


                                            <a style="font-size: 12px;" href="results.php?search=in">in</a> :


                                            <a style="font-size: 17px;" href="results.php?search=video">video</a> :


                                            <a style="font-size: 17px;" href="results.php?search=brainpower">brainpower</a> :


                                            <a style="font-size: 12px;" href="results.php?search=bed">bed</a> :


                                            <a style="font-size: 12px;" href="results.php?search=strength">strength</a> :


                                            <a style="font-size: 17px;" href="results.php?search=intocht">intocht</a> :


                                            <a style="font-size: 12px;" href="results.php?search=espaÑa">espaÑa</a> :


                                            <a style="font-size: 17px;" href="results.php?search=the">the</a> :


                                            <a style="font-size: 12px;" href="results.php?search=paintballs">paintballs</a> :


                                            <a style="font-size: 17px;" href="results.php?search=move">move</a> :


                                            <a style="font-size: 17px;" href="results.php?search=bjorn">bjorn</a> :


                                            <a style="font-size: 17px;" href="results.php?search=and">and</a> :


                                            <a style="font-size: 12px;" href="results.php?search=deal">deal</a> :


                                            <a style="font-size: 12px;" href="results.php?search=newlife">newlife</a> :


                                            <a style="font-size: 12px;" href="results.php?search=fly">fly</a> :


                                            <a style="font-size: 12px;" href="results.php?search=trot">trot</a> :


                                            <a style="font-size: 12px;" href="results.php?search=shaup">shaup</a> :


                                            <a style="font-size: 17px;" href="results.php?search=jet">jet</a> :


                                            <a style="font-size: 17px;" href="results.php?search=wielen">wielen</a> :


                                            <a style="font-size: 12px;" href="results.php?search=july">july</a> :


                                            <a style="font-size: 12px;" href="results.php?search=magic">magic</a> :


                                            <a style="font-size: 12px;" href="results.php?search=bye">bye</a> :


                                            <a style="font-size: 12px;" href="results.php?search=school">school</a> :


                                            <a style="font-size: 12px;" href="results.php?search=dansen">dansen</a> :


                                            <a style="font-size: 12px;" href="results.php?search=ina">ina</a> :


                                            <a style="font-size: 12px;" href="results.php?search=acrobatics">acrobatics</a> :


                                            <a style="font-size: 12px;" href="results.php?search=recycle">recycle</a> :


                                            <a style="font-size: 17px;" href="results.php?search=psa">psa</a> :


                                            <a style="font-size: 17px;" href="results.php?search=smile">smile</a> :


                                            <a style="font-size: 12px;" href="results.php?search=2005">2005</a> :


                                            <a style="font-size: 12px;" href="results.php?search=sevilla">sevilla</a> :


                                            <a style="font-size: 12px;" href="results.php?search=vierdaagse">vierdaagse</a> :


                                            <a style="font-size: 12px;" href="results.php?search=wedding">wedding</a> :


                                            <a style="font-size: 12px;" href="results.php?search=shootin">shootin</a> :


                                            <a style="font-size: 12px;" href="results.php?search=joe">joe</a> :


                                            <div style="font-size: 14px; font-weight: bold; margin-top: 10px;"><a href="tags.php">See More Tags</a></div>

                                        </div>

                                        <div style="padding-top: 15px;">
                                            <table width="180" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFCC" align="center">
                                                <tbody>
                                                    <tr>
                                                        <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                        <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                        <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                        <td width="170">
                                                            <div style="padding: 5px 5px 5px 5px;">
                                                                <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                                                                </script>
                                                            </div>
                                                        </td>
                                                        <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="yts/imgbin/box_login_bl.gif" width="5" height="5"></td>
                                                        <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                        <td><img src="yts/imgbin/box_login_br.gif" width="5" height="5"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <?php include('includes/html/footer.php'); ?>
</body>

</html>