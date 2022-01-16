<?php
include('../includes/youtubei/createRequest.php');

header("Content-type: application/json");
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    
    $mainResponseObject = requestChannel($id,"videos");
    if($mainResponseObject)
    {
        $response = array(
            
        );
    }
}
else
{
    $response = array(
        "error" => "No channel id",
        "errorCode" => 1,
        "errorType" => 0,
        "responseCode" => 1,
        "success" => false,
    );
    echo $response;
}