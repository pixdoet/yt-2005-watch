<?php
// simple comment fetcher & parser for the new and fresh OOP API
header("Server: LAS Continuation Generator (1/2/3/4);");


include("includes/backends/next.php");

use OFive\Backends\Next;

$comments = new Next;

$comments->comments("jNQXAC9IVRw");

echo ($comments);
