<?php
include("./includes/youtubei/createRequest.php");
include("includes/config.inc.php");
if (!isset($_GET['id'])) {
    echo "Please enter a channel ID";
} else {
    $id = $_GET['id'];
    $mainResponseObject = json_decode(requestChannel($id, "about"));
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
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr valign="top">
                                    <td rowspan="2" style="padding: 0px 5px 5px 5px;" width="130"><a href="index.php"><img src="yts/imgbin/logo_sm.gif" alt="YouTube" width="120" height="48" border="0"></a></td>
                                    <td valign="top">

                                        <table width="670" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr valign="top">
                                                    <td style="padding: 0px 5px 0px 5px; font-style: italic;">Upload, tag and share your videos worldwide!</td>
                                                    <td align="right">
                                                        <table cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>

                                                                    <td><a href="signup.php" class="bold">Sign Up</a></td>
                                                                    <td>&nbsp;&nbsp;|&nbsp;&nbsp;</td>
                                                                    <td><a href="login.php">Log In</a></td>
                                                                    <td>&nbsp;&nbsp;|&nbsp;&nbsp;</td>
                                                                    <td style="padding-right: 5px;"><a href="help.php">Help</a></td>


                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="100%">

                                        <div style="font-size: 12px; font-weight: bold; float: right; padding: 10px 5px 0px 5px;"><a href="my_videos_upload.php">Upload</a> &nbsp;//&nbsp; <a href="browse.php">Browse</a> &nbsp;//&nbsp; <a href="my_friends_invite.php">Invite</a></div>

                                        <table cellspacing="0" cellpadding="2" border="0">
                                            <tbody>
                                                <tr>
                                                    <form method="GET" action="results.php"></form>
                                                    <td>
                                                        <input type="text" value="" name="search" size="30" maxlength="128" style="color:#ff3333; font-size: 14px; padding: 2px;">
                                                    </td>
                                                    <td>
                                                        <input type="submit" value="Search Videos">
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>


                            </tbody>
                        </table>

                        <table style="margin: 5px 0px 10px 0px;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#D5E5F5" align="center">
                            <tbody>
                                <tr>
                                    <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                    <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                    <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                </tr>
                                <tr>
                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>

                                    <td width="100%">

                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table cellspacing="0" cellpadding="2" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>&nbsp;<a href="index.php">Home</a></td>
                                                                    <td>&nbsp;|&nbsp;</td>
                                                                    <td><a href="my_videos.php">My Videos</a></td>
                                                                    <td>&nbsp;|&nbsp;</td>
                                                                    <td><a href="my_favorites.php">My Favorites</a></td>
                                                                    <td>&nbsp;|&nbsp;</td>
                                                                    <td><a href="my_friends.php">My Friends</a>&nbsp;<img src="yts/imgbin/new.gif"></td>
                                                                    <td>&nbsp;|&nbsp;</td>
                                                                    <td><a href="my_profile.php">My Profile</a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
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
                        </table>

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

        <table cellspacing="0" cellpadding="10" border="0" align="center">
            <tbody>
                <tr>
                    <td valign="center" align="center"><span class="footer"><a href="whats_new.php">What's New</a> | <a href="about.php">About Us</a> | <a href="help.php">Help</a> | <a href="terms.php">Terms of Use</a> | <a href="privacy.php">Privacy Policy</a>
                            <br><br>Copyright © 2005 YouTube, LLC™ | <a href="rss/global/recently_added.rss"><img src="yts/imgbin/rss.gif" style="vertical-align: text-top;" width="36" height="14" border="0"></a></span></td>
                </tr>
            </tbody>
        </table>



    </body>

    </html>
<?php } ?>