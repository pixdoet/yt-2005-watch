<?php
session_start();

include("includes/youtubei/createRequest.php");

// form a youtubei request to /youtubei/v1/browse, then get the first 10 results
// we then fetch data with /youtube1/v1/player 

$response_object = requestBrowse("FEwhat_to_watch");

$response = json_decode($response_object);
function homepageFeed($number)
{
    $response_object = requestBrowse("FEwhat_to_watch");

    $response = json_decode($response_object);
    $feedobj = $response->contents->twoColumnBrowseResultsRenderer->tabs[0]->tabRenderer->content->richGridRenderer->contents[$number];
    print_r($feedobj);
    return $feedobj;
}
$test = homepageFeed(1);
echo $test->richItemRenderer->videoRenderer->videoId;
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>YouTube - Your Digital Video Repository</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="yts/imgbin/favicon.ico" type="image/x-icon">
    <link href="yts/cssbin/styles.css" rel="stylesheet" type="text/css">
    <link rel="alternate" type="application/rss+xml" title="YouTube " recently="" added="" videos="" [rss]"="" href="http://www.youtube.com/rss/global/recently_added.rss">
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
                                                                <td>&nbsp;<a href="index.php" class="bold">Home</a></td>
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


                                                        <div class="moduleEntry">
                                                            <table width="565" cellspacing="0" cellpadding="0" border="0">
                                                                <tbody>
                                                                    <tr valign="top">
                                                                        <td><a href="index.php?v=1cMc3n5-iqQ"><img src="get_still.php?video_id=1cMc3n5-iqQ" class="moduleEntryThumb" width="120" height="90"></a></td>
                                                                        <td width="100%">
                                                                            <div class="moduleEntryTitle"><a href="index.php?v=1cMc3n5-iqQ">Homage To The Real NorCal</a></div>
                                                                            <div class="moduleEntryDescription">It's described. As is above. A homage and tribute to the grand city of Martinez, and the future home of the new reality TV show.</div>
                                                                            <div class="moduleEntryTags">
                                                                                Tags // <a href="results.php?search=Martinez">Martinez</a> : <a href="results.php?search=Real">Real</a> : <a href="results.php?search=NorCal">NorCal</a> : <a href="results.php?search=Awesome">Awesome</a> : </div>
                                                                            <div class="moduleEntryDetails">Added: July 31, 2005 by <a href="profile.php?user=icer2k5">icer2k5</a></div>
                                                                            <div class="moduleEntryDetails">Views: 70 | Comments: 0</div>
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

    <table cellspacing="0" cellpadding="10" border="0" align="center">
        <tbody>
            <tr>
                <td valign="center" align="center"><span class="footer"><a href="whats_new.php">What's New</a> | <a href="about.php">About Us</a> | <a href="help.php">Help</a> | <a href="terms.php">Terms of Use</a> | <a href="privacy.php">Privacy Policy</a>
                        <br><br>Copyright © 2005 YouTube, LLC™. Frontend made by <a href="https://github.com/pixdoet">Ian</a> | <a href="rss/global/recently_added.rss"><img src="yts/imgbin/rss.gif" style="vertical-align: text-top;" width="36" height="14" border="0"></a></span></td>
            </tr>
        </tbody>
    </table>
</body>

</html>