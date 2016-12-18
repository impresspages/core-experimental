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

if (!is_dir('public/Plugin')) {
    `cp -rf vendor/impresspages/core/start-pack/Plugin public/`;
}

if (!is_dir('public/Theme')) {
    `cp -rf vendor/impresspages/core/start-pack/Theme public/`;
}

if (!is_dir('public/file')) {
    `cp -rf vendor/impresspages/core/start-pack/file public/`;
}

//user could have removed admin.php or favicon.ico.
if (
    !is_file('public/admin.php') &&
    !is_file('public/favicon.ico') &&
    !is_file('public/index.php')
) {
    `cp -rf vendor/impresspages/core/start-pack/admin.php public/`;
    `cp -rf vendor/impresspages/core/start-pack/favicon.ico public/`;
    `cp -rf vendor/impresspages/core/start-pack/index.php public/`;
}
