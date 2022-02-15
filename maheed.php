<?php
include('includes/youtubei/createRequest.php');

header("Content-type: application/json");

$k = requestChannel("UCt_VTKy-LTj-49tYxQw9kDA","about");
echo $k;
