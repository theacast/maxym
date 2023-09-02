<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));


if (file_exists($maintenance = __DIR__.'/engine/add/fdd/rdd.php')) {
    require $maintenance;
}


require __DIR__.'/engine/fork/autoload.php';

$app = require_once __DIR__.'/engine/fegg/app.php';

$app->bind('path.public', function() {
    return __DIR__;
});

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
