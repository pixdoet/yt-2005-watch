<?php
require __DIR__ . "/vendor/autoload.php";

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$file = new FilesystemLoader(__DIR__ . "/templates");
$twig = new Environment($file);

include_once("includes/config.inc.php");

echo $twig->render(
    "privacy.html.twig",
);
