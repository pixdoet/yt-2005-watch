<?php

/**
 * Browse.php: trending for 2005 (I guess)
 * 
 * @author Ian Hiew (pixdo.et@gmail.com)
 */
include("includes/youtubei/browse.php");
include_once("includes/config.inc.php");
$mainResponseContext = json_decode(requestBrowse("FEtrending"));
