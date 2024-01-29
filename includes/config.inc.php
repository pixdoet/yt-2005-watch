<?php
/* GENERAL SITE APPEARANCE */
$resultsCount = 10; // how many results you want in the search page

/* INNERTUBE REQUESTS SPECIFIC STUFF */
define("ANDROIDTUBE_REQUEST_CLIENT_VERSION",  "17.31.35"); // only used in player
define("ANDROIDTUBE_REQUEST_USER_AGENT", "com.google.android.youtube/17.31.35 (Linux; U; Android 11) gzip");
define("ANDROIDTUBE_SDK_VERSION", 30);

define("INNERTUBE_CONTEXT_CLIENT_VERSION", "2.20220629.00.01");

define("INNERTUBE_REQUEST_API_KEY", "AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8");
define("INNERTUBE_REQUEST_USER_AGENT", "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:100.0) Gecko/20100101 Firefox/100.0");

/* INTERNAL (DO NOT LEAK) */
/* Files on Github for placeholder only */
$debugCode = "7c8af1";
$shutdown = true;
$accessCode = "zamning";

/* DRM */
if ($shutdown)
{
    if !(isset($_GET['accessCode']) && $_GET['accessCode'] == $accessCode){
        header("Location: https://pixdoet.github.io/yt2005-shutdown.html");
    }
}

/* CURRENTLY UNUSED STUFF */

$sapisidhash = "";
$cookiefile = "../cookies.txt";