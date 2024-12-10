<?php
use Global\Controllers\HomeController;

$router->get('/', [HomeController::class, 'index']);