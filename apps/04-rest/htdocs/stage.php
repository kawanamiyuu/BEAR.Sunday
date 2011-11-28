<?php
/**
 * CLI / built-in web server script.
 *
 * @package BEAR.Framework
 */

if (php_sapi_name() == 'cli-server') {
    // route static assets and return false
    if (preg_match('/\.(?:png|jpg|jpeg|gif|js)$/', $_SERVER["REQUEST_URI"])) {
        return false;
    }
}

include dirname(__DIR__) . '/script/bootstrap.php';

try {
    $http = $resource->$method->object($page)->linkSelf('view')->eager->request();
} catch (\Exception $e) {
    echo $e . PHP_EOL;
    exit(1);
}

// output
include dirname(__DIR__) . '/script/output.php';