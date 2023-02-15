<?php

$routes = [];

route('/', function() {
    require_once __DIR__ . '/routes/index.php';
});

route('/new', function() {
    require_once __DIR__ . '/routes/new.php';
});

route('/delete', function() {
    require_once __DIR__ . '/routes/delete.php';
});

function route(string $path, callable $callback) {
    global $routes;
    $routes[$path] = $callback;
}

start();

function start() {
    global $routes;
    $uri = $_SERVER['REQUEST_URI'];
    if(array_key_exists($uri,$routes))
        $routes[$uri]();
}