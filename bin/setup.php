<?php






if (getcwd() . '/vendor/impresspages/core/bin' != __DIR__) {
    throw new \Exception('This script must be executed from the project root (where composer.json is placed');
}

`rm -rf public/Ip/*`;

`mkdir -p public/Ip`;
`mkdir -p public/Ip/Internal`;

$assetPaths = glob(dirname(__DIR__) . '/Ip/Internal/*/assets/');

foreach ($assetPaths as $assetPath) {
    $module = basename(dirname($assetPath));
    `mkdir -p public/Ip/Internal/$module/`;
    `cp -rf $assetPath public/Ip/Internal/$module`;
}