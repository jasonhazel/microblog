<?php

$f3->route(
    'GET /', 
    'Controllers\Post->all'
);

$f3->route(
    'GET /post/@id',
    'Controllers\Post->get'
);

$f3->route(
    'GET /posts/@start/@count',
    'Controllers\Post->page'
);

$f3->route(
    'GET /tag/@tag',
    'Controllers\Post->tag'
);



?>