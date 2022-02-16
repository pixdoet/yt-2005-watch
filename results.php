<?php

include("includes/youtubei/createRequest.php");
include("includes/config.inc.php");

if (!isset($_GET['search'])) {
    include("includes/html/noquery.php");
} else {
    $query = $_GET['search'];
    $mainResponseObject = json_decode(requestSearch($query));

    // start parsing search results (creepy)
    if (isset($mainResponseObject->contents->twoColumnSearchResultsRenderer->primaryContents->sectionListRenderer->contents[0]->itemSectionRenderer->contents)) {
        $items = $mainResponseObject->contents->twoColumnSearchResultsRenderer->primaryContents->sectionListRenderer->contents[0]->itemSectionRenderer->contents;
        // check if this is "did you mean"
        $arr = 0;
        if (isset($items[0]->didYouMeanRenderer)) {
            // start from element 1
            $arr = 1;
        }
        // also skip channels
        elseif (isset($items[0]->channelRenderer)) {
            $arr = 1;
        }
        // we wanna find out how many results are there
        // so that we can prevent looping too much if there's
        // less than desired amount of results
        if (sizeof($items) <= $resultsCount) {
            $loopRounds = sizeof($items);
        } else {
            $loopRounds = $resultsCount;
        }
        // ok we done here now go to the HTML section below...

    } else {
        require('includes/html/noresults.php');
    }

?>
    <!DOCTYPE html>
    <html>

    <head>

        <title>YouTube - Broadcast Yourself.</title>

        <link rel="stylesheet" type="text/css" href="yts/cssbin/styles.css">
        <link rel="icon" href="yts/imgbin/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="yts/imgbin/favicon.ico" type="image/x-icon">

        <link rel="alternate" type="application/rss+xml" title="YouTube - Recently Added Videos [RSS]" href="http://www.youtube.com/rss/global/recently_added.rss">

        <script type="text/javascript">
            onLoadFunctionList = new Array();

            function performOnLoadFunctions() {
                for (var i in onLoadFunctionList) {
                    onLoadFunctionList[i]();
                }
            }
        </script>

        <meta name="description" content="Share your videos with friends and family">
        <meta name="keywords" content="video,sharing,camera phone,video phone">

    </head>

    <body onload="performOnLoadFunctions();">
        <table width="800" cellspacing="0" cellpadding="0" border="0" align="center">
            <tbody>
                <tr>
                    <td style="padding-bottom: 25px;" bgcolor="#FFFFFF">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr valign="top">
                                    <td rowspan="2" style="padding: 0px 5px 5px 5px;" width="130"><a href="/index.php"><img src="yts/imgbin/logo_sm.gif" alt="YouTube" style="vertical-align: middle; " width="120" height="48" border="0"></a></td>
                                    <td valign="top">

                                        <table width="670" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr valign="top">
                                                    <td style="padding: 0px 5px 0px 5px; font-style: italic;">Upload, tag and share your videos worldwide!</td>
                                                    <td align="right">

                                                        <table cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="/signup.php"><strong>Sign Up</strong></a></td>
                                                                    <td style="padding: 0px 5px 0px 5px;">|</td>
                                                                    <td><a href="/login.php">Log In</a></td>
                                                                    <td style="padding: 0px 5px 0px 5px;">|</td>
                                                                    <td style="padding-right: 5px;"><a href="/help.php">Help</a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr valign="bottom">
                                    <td>
                                        <!-- tab table -->
                                        <table cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table style="background-color: #DDDDDD; margin: 5px 2px 1px 0px; border-bottom: 1px solid #DDDDDD;" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                                    <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                                    <td style="padding: 0px 20px 5px 20px; font-size: 13px; font-weight: bold;"><a href="/index.php">Home</a></td>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table style="background-color: #BECEEE; margin: 5px 2px 1px 0px;" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                                    <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                                    <td style="padding: 0px 20px 5px 20px; font-size: 13px; font-weight: bold;"><a href="/browse.php">Videos</a></td>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table style="background-color: #BECEEE; margin: 5px 2px 1px 0px;" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                                    <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                                    <td style="padding: 0px 20px 5px 20px; font-size: 13px; font-weight: bold;"><a href="/channels">Channels</a></td>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table style="background-color: #BECEEE; margin: 5px 2px 1px 0px;" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                                    <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                                    <td style="padding: 0px 20px 5px 20px; font-size: 13px; font-weight: bold;"><a href="/my_friends.php">Friends</a></td>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table style="background-color: #BECEEE; margin: 5px 2px 1px 0px;" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                                                    <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                                    <td style="padding: 0px 20px 5px 20px; font-size: 13px; font-weight: bold;"><a href="/my_videos_upload.php">Upload</a></td>
                                                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <table style="margin-bottom: 10px;" width="800" cellspacing="0" cellpadding="0" border="0" bgcolor="#DDDDDD" align="center">
                            <tbody>
                                <tr>
                                    <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                    <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                    <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                </tr>
                                <tr>
                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                    <td style="padding: 2px;" width="790" align="center">

                                        <table cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="font-size: 10px;">&nbsp;</td>
                                                    <td><a href="/my_videos.php">My Videos</a></td>
                                                    <td style="padding: 0px 10px 0px 10px;">|</td>
                                                    <td><a href="/my_favorites.php">My Favorites</a></td>
                                                    <td style="padding: 0px 10px 0px 10px;">|</td>
                                                    <td><a href="/my_messages.php">My Messages</a></td>
                                                    <td style="padding: 0px 10px 0px 10px;">|</td>
                                                    <td><a href="/subscription_center">My Subscriptions</a></td>
                                                    <td style="padding: 0px 10px 0px 10px;">|</td>
                                                    <td><a href="/pl_manager">My Playlists</a></td>
                                                    <td style="padding: 0px 10px 0px 10px;">|</td>
                                                    <td><a href="/my_profile.php">My Profile</a></td>
                                                    <td style="font-size: 10px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                    <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                </tr>
                                <tr>
                                    <td style="border-bottom: 1px solid #FFFFFF"><img src="yts/imgbin/box_login_bl.gif" width="5" height="5"></td>
                                    <td style="border-bottom: 1px solid #BBBBBB"><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                    <td style="border-bottom: 1px solid #FFFFFF"><img src="yts/imgbin/box_login_br.gif" width="5" height="5"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="margin-bottom: 10px;" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody>
                                <tr>
                                    <form name="searchForm" id="searchForm" method="get" action="results.php">
                                        <td style="padding-right: 5px;"><input tabindex="1" type="text" name="search" maxlength="128" value="<?php echo htmlspecialchars($_GET['search']); ?>" style="color:#ff3333; font-size: 12px; width: 300px;"></td>
                                        <td>
                                            <input type="submit" name="search_videos" value="Search Videos">
                                    </form>
                    </td>

                </tr>
            </tbody>
        </table>


        <div style="color: #333; margin-bottom: 10px;">Related Tags:

            <a href="results.php?search=crazy">crazy</a>
            <a href="results.php?search=is">is</a>
            <a href="results.php?search=YOUTUBE">YOUTUBE</a>
            <a href="results.php?search=catsta">catsta</a>
            <a href="results.php?search=victim">victim</a>
            <a href="results.php?search=catlin">catlin</a>
            <a href="results.php?search=technology">technology</a>
            <a href="results.php?search=callforhelp">callforhelp</a>
            <a href="results.php?search=what">what</a>
            <a href="results.php?search=tube">tube</a>
            <a href="results.php?search=winner">winner</a>
            <a href="results.php?search=YouTube">YouTube</a>
            <a href="results.php?search=hotornot">hotornot</a>
            <a href="results.php?search=plugged">plugged</a>
            <a href="results.php?search=experiment">experiment</a>
            <a href="results.php?search=FAN">FAN</a>
            <a href="results.php?search=party">party</a>
            <a href="results.php?search=cool">cool</a>
            <a href="results.php?search=friend">friend</a>
            <a href="results.php?search=trippy">trippy</a>
            <a href="results.php?search=fun">fun</a>
            <a href="results.php?search=euterpe">euterpe</a>
            <a href="results.php?search=sexy">sexy</a>
            <a href="results.php?search=editing">editing</a>
            <a href="results.php?search=the">the</a>
            <a href="results.php?search=psychedelic">psychedelic</a>
            <a href="results.php?search=massier">massier</a>
            <a href="results.php?search=on">on</a>
            <a href="results.php?search=television">television</a>
            <a href="results.php?search=youtube">youtube</a>
            <a href="results.php?search=professorsmile">professorsmile</a>
            <a href="results.php?search=ADDICTED">ADDICTED</a>
            <a href="results.php?search=Japan">Japan</a>
            <a href="results.php?search=YES">YES</a>
            <a href="results.php?search=ambermacarthur">ambermacarthur</a>
            <a href="results.php?search=radio">radio</a>

        </div>

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
                        <?php
                        for ($i = $arr; $i < $loopRounds; $i++) {
                            // declare vars
                            // the array format used in watch.php is too annoying
                            // so everything is it's own variable now! yay!
                            if (isset($items[$i]->videoRenderer)) {
                                $videoId = $items[$i]->videoRenderer->videoId;
                                $videoTitle = $items[$i]->videoRenderer->title->runs[0]->text;
                                //$videoDescription = $items[$]->videoRenderer->
                                $videoThumbnail = $items[$i]->videoRenderer->thumbnail->thumbnails[0]->url;
                                $videoAuthor = $items[$i]->videoRenderer->longBylineText->runs[0]->text;
                                $videoViews = $items[$i]->videoRenderer->viewCountText->simpleText;
                                $videoRuntime = $items[$i]->videoRenderer->lengthText->simpleText;
                                $videoUploadTime = $items[$i]->videoRenderer->publishedTimeText->simpleText;
                                $authorChannelId = $items[$i]->videoRenderer->longBylineText->runs[0]->navigationEndpoint->browseEndpoint->browseId;
                        ?>
                                <div class="moduleEntry">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody>
                                            <tr valign="top">
                                                <td>
                                                    <table cellspacing="0" cellpadding="0" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td><a href="watch.php?v=<?php echo $videoId; ?>&amp;search=youtube"><img src="<?php echo $videoThumbnail; ?>" class="moduleEntryThumb" width="100" height="75"></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                                <td width="100%">
                                                    <div class="moduleEntryTitle"><a href="watch.php?v=<?php echo $videoId; ?>&search=youtube"><?php echo $videoTitle; ?></a></div>
                                                    <div class="moduleEntryDescription">I think YouTube is very exciting.</div>
                                                    <div class="moduleEntryTags">
                                                        Tags // <a href="/results.php?search=professor">professor</a> : <a href="/results.php?search=mind">mind</a> : <a href="/results.php?search=secrets">secrets</a> : <a href="/results.php?search=cannabis">cannabis</a>
                                                    </div>
                                                    <div class="moduleEntryDetails">Channels // <a href="/channels_portal.php?c=3">Education &amp; Instructional</a> : <a href="/channels_portal.php?c=8">Hobbies &amp; Interests</a> : <a href="/channels_portal.php?c=9">Humor</a>
                                                    </div>
                                                    <div class="moduleEntryDetails">Added: <?php echo $videoUploadTime; ?> by <a href="profile.php?id=<?php echo $authorChannelId; ?>"><?php echo $videoAuthor; ?></a></div>
                                                    <div class="moduleEntryDetails">Runtime: <?php echo $videoRuntime; ?> | Views: <?php echo $videoViews; ?> | Comments: 0</div>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            } elseif (isset($items[$i]->channelRenderer)) {
                                $i += 1;
                            }
                            ?>
                        <?php
                        }
                        ?>

                        <!-- begin paging -->
                        <div style="font-size: 13px; font-weight: bold; color: #444; text-align: right; padding: 5px 0px 5px 0px;">
                            Results Page:
                            <span style="color: #444; background-color: #FFFFFF; padding: 1px 4px 1px 4px; border: 1px solid #999; margin-right: 5px;">1</span>
                        </div>
                        <!-- end paging -->


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
        </tr>
        </tbody>
        </table>

        <?php include("includes/html/footer.php")?>

    </body>

    </html>
<?php
}
// end file
?>