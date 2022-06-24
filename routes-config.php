<?php
$routes = 
[
    '/404' => framework\http\controller\request\HTTP404Request::class,
    '/' => demo\controllers\requests\HomeRequest::class,
    '/welcome' => demo\controllers\requests\HomeRequest::class,
    '/ShowFileRequest' => demo\controllers\requests\ShowFileRequest::class,
    '/ShowFileResponse' => demo\controllers\requests\ShowFileRequest::class,
    '/HomeRequest' => demo\controllers\requests\ShowFileRequest::class,
    '/HomeResponse' => demo\controllers\requests\ShowFileRequest::class,
    '/index' => demo\controllers\requests\ShowFileRequest::class,
    '/app-config' => demo\controllers\requests\ShowFileRequest::class,
    '/routes-config' => demo\controllers\requests\ShowFileRequest::class,
    '/composer' => demo\controllers\requests\ShowFileRequest::class,
    '/htaccess' => demo\controllers\requests\ShowFileRequest::class,
    '/html-footer' => demo\controllers\requests\ShowFileRequest::class,
    '/sidebar-navigation' => demo\controllers\requests\ShowFileRequest::class,
    '/html-head' => demo\controllers\requests\ShowFileRequest::class,
    '/top-navbar' => demo\controllers\requests\ShowFileRequest::class,
    '/html-footer-scripts' => demo\controllers\requests\ShowFileRequest::class,
    '/404' => demo\controllers\requests\ShowFileRequest::class,
    '/home' => demo\controllers\requests\ShowFileRequest::class,
    '/show-file' => demo\controllers\requests\ShowFileRequest::class
]
?>