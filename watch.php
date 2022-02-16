<?php
// watch.php for watching videos

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
            $videoHtml = sprintf('<video controls src="%s" class="video-player googlevideo-player" style="width: 427px; margin:center;">', $mainResponseObject->streamingData->formats[0]->url);
        } else {
            // generate error text HTML
            $videoHtml = sprintf('Video unavailable for playback. <a href="https://youtube.com/watch?v=%s">Watch on YouTube</a>', $id);
        }


?>
        <!DOCTYPE html>
        <html lang="en" data-cast-api-enabled="false">

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>YouTube - Your Digital Video Repository</title>
            <script type="text/javascript" src="yts/jsbin/flashobject.js"></script>
            <link rel="icon" href="yts/imgbin/favicon.ico" type="image/x-icon">
            <link rel="shortcut icon" href="yts/imgbin/favicon.ico" type="image/x-icon">
            <link href="yts/cssbin/styles.css" rel="stylesheet" type="text/css">
            <link rel="alternate" type="application/rss+xml" title="YouTube " recently="" added="" videos="" [rss]="" href="http://www.youtube.com/rss/global/recently_added.rss">
        </head>


        <body class="year-2005 backend-api-youtubei">

            <table width="800" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody>
                    <tr>
                        <td style="padding-bottom: 25px;" bgcolor="#FFFFFF">
                            <?php include("includes/html/header.php") ?>
                            <div style="padding: 0px 5px 0px 5px;">


                                <iframe id="invisible" name="invisible" src="" scrolling="yes" marginheight="0" marginwidth="0" width="0" height="0" frameborder="0"></iframe>

                                <script>
                                    function CheckLogin() {

                                        alert("You must be logged in to to perform this action!");
                                        return false;


                                        return true;
                                    }

                                    function FavoritesHandler() {
                                        if (CheckLogin() == false)
                                            return false;

                                        alert("Video has been added to Favorites!");
                                        return true;
                                    }

                                    function CommentHandler() {
                                        if (CheckLogin() == false)
                                            return false;

                                        var comment = document.comment_form.comment;
                                        var comment_button = document.comment_form.comment_button;

                                        if (comment.value.length == 0 || comment.value == null) {
                                            alert("You must enter a comment!");
                                            comment.focus();
                                            return false;
                                        }

                                        if (comment.value.length > 500) {
                                            alert("Your comment must be shorter than 500 characters!");
                                            comment.focus();
                                            return false;
                                        }

                                        comment_button.disabled = 'true';
                                        comment_button.value = 'Thanks for your comment!';

                                        return true;
                                    }
                                </script>

                                <table width="795" cellspacing="0" cellpadding="0" border="0" align="center">
                                    <tbody>
                                        <tr valign="top">
                                            <td style="padding-right: 15px;" width="515">

                                                <div class="tableSubTitle"><?php echo $videoDetails["videoTitle"]; ?></div>
                                                <div style="font-size: 13px; font-weight: bold; text-align:center;">
                                                    <a href="mailto:?subject=<?php echo $videoDetails["videoTitle"]; ?>&body=http://www.youtube.com/watch?v=<?php echo $id; ?>">Share</a>
                                                    // <a href="#comment">Comment</a>
                                                    // <a href="add_favorites.php?video_id=<?php echo $id; ?>" target="invisible" onclick="return FavoritesHandler();">Add to Favorites</a>
                                                    // <a href="outbox.php?user=<?php echo $videoDetails["videoAuthor"]; ?>&subject=Re: <?php echo $videoDetails['videoTitle']; ?>1">Contact Me</a>
                                                </div>

                                                <div style="text-align: center; padding-bottom: 10px;">
                                                    <div id="flashcontent" class="videoPlayerHolder">
                                                        <?php echo $videoHtml; ?>
                                                    </div>
                                                </div>

                                                <table width="425" cellspacing="0" cellpadding="0" border="0" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="watchDescription"><?php echo $videoDetails["videoDescription"]; ?><div class="watchAdded" style="margin-top: 5px;">
                                                                    </div>
                                                                </div>
                                                                <div class="watchTags">Tags //
                                                                    <?php
                                                                    for ($i = 0; $i < $tagcount; $i++) {
                                                                    ?>
                                                                        <a href="results.php?search=<?php echo $tags[$i]; ?>"><?php echo $tags[$i]; ?></a> :
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>

                                                                <div class="watchAdded">
                                                                    Added: <?php echo $videoDetails["videoUploadDate"]; ?> by <a href="profile.php?id=<?php echo $videoDetails['authorChannelId']; ?>"><?php echo $videoDetails["videoAuthor"]; ?></a> //
                                                                    <a href="profile_videos.php?id=<?php echo $videoDetails['authorChannelId']; ?>">Videos</a> (64) | <a href="profile_favorites.php?user=<?php echo $videoDetails["videoAuthor"]; ?>">Favorites</a> (0) | <a href="profile_friends.php?user=<?php echo $videoDetails["videoAuthor"]; ?>">Friends</a> (16)
                                                                </div>

                                                                <div class="watchDetails">
                                                                    Views: <?php echo $videoDetails['videoViews']; ?> | <a href="#comment">Comments</a>: 1 </div>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <!-- watchTable -->

                                                <div style="padding: 15px 0px 10px 0px;">
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#E5ECF9" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                                <td width="100%"><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                                <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <form name="linkForm" id="linkForm"></form>
                                                                <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                                <td align="center">

                                                                    <div style="font-size: 11px; font-weight: bold; color: #CC6600; padding: 5px 0px 5px 0px;">Share this video! Copy and paste this link:</div>
                                                                    <div style="font-size: 11px; padding-bottom: 15px;">
                                                                        <input name="video_link" type="text" onclick="javascript:document.linkForm.video_link.focus();document.linkForm.video_link.select();" value="http://www.youtube.com/watch?v=<?php echo $id; ?>" size="50" readonly="true" style="font-size: 10px; text-align: center;">
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

                                                <a name="comment"></a>
                                                <div style="padding-bottom: 5px; font-weight: bold; color: #444;">Comment on this video:</div>

                                                <form name="comment_form" id="comment_form" method="post" action="add_comment.php" target="invisible" onsubmit="return CommentHandler();">
                                                    <input type="hidden" name="video_id" value="vy8evhya_9E">

                                                    <textarea name="comment" cols="55" rows="3"></textarea>
                                                    <br>
                                                    <input type="submit" name="comment_button" value="Add Comment">


                                                </form>
                                                <br>

                                                <div class="commentsTitle">Comments (1):</div>

                                                <div class="commentsEntry">Comments not yet implemented...<br>
                                                    - (100000 Centuries ago)</div>
                                            </td>
                                            <td width="280">
                                                <table width="280" cellspacing="0" cellpadding="0" border="0" bgcolor="#CCCCCC" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                            <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                            <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                            <td width="270">
                                                                <div class="moduleTitleBar">
                                                                    <table width="270" cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                            <tr valign="top">

                                                                                <td>
                                                                                    <div class="moduleFrameBarTitle">Related Videos (1 of Many)</div>
                                                                                </td>
                                                                                <td align="right">
                                                                                    <div style="font-size: 11px; margin-right: 5px;"><a href="results.php?search=<?php echo $videoDetails['videoTitle']; ?>" target="_parent">See All Results</a></div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                <div id="side_results" name="side_results">
                                                                    <div class="moduleFrameEntrySelected">

                                                                        <table width="235" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr valign="top">
                                                                                    <td width="90">
                                                                                        <a href="watch.php?v=<?php echo $id ?>" class="bold" target="_parent"><img src="<?php echo $videoDetails['videoThumbnail']; ?>" class="moduleEntryThumb" width="80" height="60"></a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="moduleFrameTitle"><a href="watch.php?v=<?php echo $id; ?>" target="_parent"><?php echo $videoDetails['videoTitle']; ?></a></div>
                                                                                        <div class="moduleFrameDetails">
                                                                                            by <a href="profile.php?user=<?php echo $videoDetails['videoAuthor']; ?>" target="_parent"><?php echo $videoDetails['videoAuthor']; ?></a>
                                                                                        </div>
                                                                                        <div class="moduleFrameDetails">
                                                                                            Runtime: <?php echo gmdate("i:s", $videoDetails["videoRuntime"]); ?><br>
                                                                                            Views: <?php echo $videoDetails['videoViews']; ?><br>
                                                                                            Comments: 4
                                                                                        </div>

                                                                                        <div style="font-size: 10px; font-weight:bold; color: #CC6600; padding: 3px 6px; background-color:#FFCC66;">
                                                                                            <nobr>&lt;&lt;&lt; NOW PLAYING!</nobr>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
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
                                                <div style="font-weight: bold; color: #333; margin: 10px 0px 5px 0px;">Related tags:</div>
                                                <?php
                                                // echo tags
                                                for ($i = 0; $i < $tagcount; $i++) {
                                                ?>
                                                    <div style="padding: 0px 0px 5px 0px; color: #999;">» <a href="results.php?search=<?php echo $tags[$i]; ?>" target="_blank"><?php echo $tags[$i]; ?></a></div>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>

                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php include("includes/html/footer.php"); ?>
        </body>

        </html>

<?php }
} ?>