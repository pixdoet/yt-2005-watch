<?php
include("./includes/youtubei/createRequest.php");
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
            "joined" => $metadata->joinedDateText->runs[1]->text,
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

    // ok now go to the HTML section below........
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>YouTube - Your Digital Video Repository</title>
        <link rel="icon" href="yts/imgbin/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="yts/imgbin/favicon.ico" type="image/x-icon">
        <link href="yts/cssbin/styles.css" rel="stylesheet" type="text/css">
        <link rel="alternate" type="application/rss+xml" title="YouTube" recently="" added="" videos="" [rss]="" href="http://www.youtube.com/rss/global/recently_added.rss">
    </head>

    <body>
        <table width="800" cellspacing="0" cellpadding="0" border="0" align="center">
            <tbody>
                <tr>
                    <td style="padding-bottom: 25px;" bgcolor="#FFFFFF">
                        <?php include("includes/html/header.php");?>
                        <div style="padding: 0px 5px 0px 5px;">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody>
                                    <tr valign="top">
                                        <td width="180">

                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#E5ECF9" align="center">
                                                <tbody>
                                                    <tr>
                                                        <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                        <td width="100%"><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                        <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                        <td style="padding: 5px;" align="center">


                                                            <div style="font-size: 14px; font-weight: bold; color:#003366; margin-bottom: 5px;">Do you know <?php echo $cDetails['name']; ?>?</div>
                                                            <a href="signup.php">Sign up</a> or <a href="login.php">log in</a> to add <?php echo $cDetails['name']; ?> as friend.<br><br>

                                                            <div style="font-size: 14px; font-weight: bold; color:#003366; margin-bottom: 5px;">Question? Comment?</div>
                                                            <form method="post" action="outbox.php?user=<?php echo $cDetails['name']; ?>">
                                                                <input type="submit" value="Contact Me!"><br>
                                                            </form>

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

                                        <td style="padding: 0px 10px 0px 10px;">

                                            <table width="100%" cellspacing="0" cellpadding="5" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="120" align="right"><span class="label">User Name:</span></td>
                                                        <td><?php echo $cDetails['name']; ?></td>
                                                    </tr>

                                                    <!-- Personal Information: -->



                                                    <tr>
                                                        <td align="right"><span class="label">Gender:</span></td>
                                                        <td>N/A</td>
                                                    </tr>



                                                    <tr valign="top">
                                                        <td style="text-align: Right;"><span class="label">About Me:</span></td>
                                                        <td><?php echo $cDetails['description']; ?></td>
                                                    </tr>


                                                    <!-- Location Information (get doxxed uwu owo) -->




                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                    </tr>



                                                    <!-- Random Information -->
                                                </tbody>
                                            </table>

                                        </td>


                                        <td width="180">

                                            <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">» Profile</div>
                                            <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">» <a href="profile_videos.php?user=AmySpear">Public Videos</a> (1)</div>
                                            <!-- only show this link to friends in their network -->
                                            <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">» <a href="profile_videos_private.php?user=AmySpear">Private Videos</a> (0)</div>
                                            <!-- only show this link to friends in their network -->
                                            <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">» <a href="profile_favorites.php?user=AmySpear">Favorites</a> (0)</div>
                                            <div style="font-size: 14px; font-weight: bold; margin-bottom: 20px; color: #444;">» <a href="profile_friends.php?user=AmySpear">Friends</a> (0)</div>

                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#CCCCCC" align="center">
                                                <tbody>
                                                    <tr>
                                                        <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                        <td width="100%"><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                        <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                        <td>
                                                            <div class="moduleTitleBar">
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="moduleTitle">My Latest Video</div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="moduleFeatured">
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align="center">
                                                                                <a href="#">
                                                                                </a>
                                                                                <div class="moduleFeaturedTitle"><a href="#">Coming soon!</a></div>
                                                                                <div class="moduleFeaturedDetails">Added: June 15, 2005 <br>by <a href="profile.php?id=<?php echo $id; ?>"><?php echo $cDetails['name']; ?></a></div>
                                                                                <div class="moduleFeaturedDetails">Views: 0</div>
                                                                                <div class="moduleFeaturedDetails">Comments: 0</div>
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

                                            <div style="font-size: 12px; color: #444; margin: 10px 0px 0px 0px; text-align: center;"><strong>Like my videos?</strong><br>
                                                <a href="<?php echo $cDetails['rss']; ?>">Subscribe to my RSS Feed.</a>
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
        <?php include("includes/html/footer.php");?>
    </body>

    </html>
<?php } ?>