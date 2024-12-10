<?php
namespace Global\Controllers;

use Global\Models\Article;

class ArticleController {
    public function index() {
        $articles = Article::all();
        header('Content-Type: application/json');
        echo json_encode($articles);
    }
}
