<?php

require_once ROOT_PATH. '/Sources/Controller/ImovelController.php';
require_once ROOT_PATH. '/Sources/Model/Imovel.php';

$app->get('/privacidade', function($request, $response){

    $tags2 = [
        "Política de privacidade | Imóveis avista",
        "Política de privacidade do Imóveis avista",
        "Brenno Duarte de Lima",
        "index",
        "follow"
    ];
    $meta = SEOTags::metaTags($tags2);
    return $this->view->render($response, "privacidade.html", [
        'meta' => $meta,
        'blogUrl' => true,
    ]);

})->setName('privacidade');

$app->get('/sobre', function($request, $response){

    $tags2 = [
        "Sobre | Imóveis avista",
        "Sobre o Imóveis avista",
        "Brenno Duarte de Lima",
        "index",
        "follow"
    ];
    $meta = SEOTags::metaTags($tags2);
    return $this->view->render($response, "sobre.html", [
        'meta' => $meta,
        'blogUrl' => true,
    ]);

})->setName('sobre');

$app->get('/termos', function($request, $response){

    $tags2 = [
        "Termos de uso | Imóveis avista",
        "Termos de uso do Imóveis avista",
        "Brenno Duarte de Lima",
        "index",
        "follow"
    ];
    $meta = SEOTags::metaTags($tags2);
    return $this->view->render($response, "termos.html", [
        'meta' => $meta,
        'blogUrl' => true,
    ]);

})->setName('termos');