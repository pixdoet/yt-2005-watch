<?php
include('includes/youtubei/createRequest.php');

header("Content-type: application/json");

$k = requestChannel("UC0ifhOnVBCUkpS-_FhcgQEQ","about");
echo $k;
