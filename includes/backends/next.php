<?php

namespace OFive\Backends;

class Next
{
    private string $continuation;
    private object $mainResponseObject;
    /**
     * fetchInitialNext - function that requests InnerTube `next` to get continuations needed for other functions
     * 
     * @param string $videoId - the video id to fetch `next` for
     */
    private static function fetchInitialNext($videoId)
    {
        include_once("includes/config.inc.php");
        $req_arr = json_encode(array(
            'context' =>
            array(
                'client' =>
                array(
                    'hl' => 'en',
                    'userAgent' => INNERTUBE_REQUEST_USER_AGENT,
                    'clientName' => 'WEB',
                    'clientVersion' => INNERTUBE_CONTEXT_CLIENT_VERSION,
                    'mainAppWebInfo' =>
                    array(
                        'graftUrl' => '/watch?v=' . $videoId,
                    ),
                ),
            ),
            'videoId' => $videoId,
            'captionsRequested' => true,
        ));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // so that the 1 doesnt show
        curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "X-Goog-AuthUser: 0",
            "X-Origin: https://www.youtube.com",
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
        curl_setopt($ch, CURLOPT_USERAGENT, INNERTUBE_REQUEST_USER_AGENT);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/next?key=" . INNERTUBE_REQUEST_API_KEY);

        $result = curl_exec($ch);
        return $result;
    }
    /**
     * fetchComment - function that requests InnerTube `next` to get comment metadata
     * 
     * @author Ian Hiew (pixdo.et@gmail.com)
     * 
     * @param string $videoId - the video id to get comments for
     * @param string $continuation - the continuation from the initial `next` request
     */
    private static function fetchComment($videoId, $continuation)
    {
        include_once("includes/config.inc.php");

        $req_arr = json_encode(array(
            'context' =>
            array(
                'client' =>
                array(
                    'hl' => 'en',
                    'userAgent' => INNERTUBE_REQUEST_USER_AGENT,
                    'clientName' => 'WEB',
                    'clientVersion' => INNERTUBE_CONTEXT_CLIENT_VERSION,
                    'mainAppWebInfo' =>
                    array(
                        'graftUrl' => '/watch?v=' . $videoId,
                    ),
                ),
            ),
            'continuation' => $continuation,
        ));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // so that the 1 doesnt show
        curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt"); // ????
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "X-Goog-AuthUser: 0",
            "X-Origin: https://www.youtube.com",
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req_arr);
        curl_setopt($ch, CURLOPT_USERAGENT, INNERTUBE_REQUEST_USER_AGENT);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com/youtubei/v1/next?key=" . INNERTUBE_REQUEST_API_KEY);

        $result = curl_exec($ch);
        return $result;
    }

    /**
     * comments - the (public) function that returns the comment object
     * 
     * @author Ian Hiew (pixdo.et@gmail.com)
     * 
     * @param string $videoId The video id to get comments for
     * @param string $continuation The continuation from the initial `next` request
     * 
     * @return json Comment json_decoded
     */
    public function comments(string $videoId)
    {
        // generate a CONTINUATION from initial next
        $this->initialResponseContext = json_decode($this->fetchInitialNext($videoId));
        if (isset($this->initialResponseContext->contents->twoColumnWatchNextResults->results->results->contents[3])) {
            $this->continuation = $this->initialResponseContext
                ->contents
                ->twoColumnWatchNextResults
                ->results
                ->results
                ->contents[3]
                ->itemSectionRenderer
                ->contents[0]
                ->continuationItemRenderer
                ->continuationEndpoint
                ->continuationCommand
                ->token;
            // fetch next again...
            $this->mainResponseObject = $this->fetchComment($videoId, $this->continuation);

            return $this->mainResponseObject;
        } else {
            die();
            return 0;
        }
    }
}
