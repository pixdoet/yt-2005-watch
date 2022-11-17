<?php

/**
 * Browse.php: trending for 2005 (I guess)
 * 
 * @author Ian Hiew (pixdo.et@gmail.com)
 */
include("includes/youtubei/browse.php");

$mainResponseContext = json_decode(requestBrowse("FEtrending"));
