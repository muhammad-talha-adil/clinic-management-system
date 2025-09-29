<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Maintenance mode check
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Autoload Composer dependencies
require __DIR__.'/../vendor/autoload.php';

// Bootstrap the application
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// Handle the incoming request
$request = Request::capture();
$response = $app->handle($request);

// Send the response back to the browser
$response->send();

// Terminate the application (runs any final tasks, like middleware termination)
$app->terminate($request, $response);
