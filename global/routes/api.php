<?php
use Global\Controllers\ArticleController;

$router->get('/api/articles', [ArticleController::class, 'index']);