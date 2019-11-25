<?php

require_once ROOT_PATH. '/Sources/Controller/BlogController.php';
require_once ROOT_PATH. '/Sources/Services/SEOTags.php';

$app->get('/[home]', function($request, $response){

    $tags2 = [
        "title",
        "description",
        "author",
        "index",
        "follow"
    ];
    $meta = SEOTags::metaTags($tags2);
    $pagina_atual = filter_input(INPUT_GET, 'pag');
    $itens_pagina = 3;

    if (empty($pagina_atual)) {
        $pagina_atual = '1';
    }

    $inicio = ($itens_pagina * $pagina_atual) - $itens_pagina;
    $blogTotal = BlogController::listar();
    $total = count($blogTotal);
    $qnt_pag = ceil($total/$itens_pagina);

    # Páginas anteriores
    $vA1 = $pagina_atual - $itens_pagina;
    $vA2 = $pagina_atual - 1;

    # Páginas posteriores
    $vP1 = $pagina_atual + 1;
    $vP2 = $pagina_atual + $itens_pagina;

    $blog = BlogController::listarLimite($inicio, $itens_pagina);

    return $this->view->render($response, "noticias.html", [
        'meta' => $meta,
        'noticias' => $blog,
        'blogUrl' => true,
        'pag_atual' => $pagina_atual,
        'valorAnt1' => $vA1,
        'valorAnt2' => $vA2,
        'valorPost1' => $vP1,
        'valorPost2' => $vP2,
        'qntPag' => $qnt_pag
    ]);

})->setName('home');

$app->get('/blog/{id}/{titulo}', function($request, $response, $args){

    $blog = BlogController::listarUnico($args['id']);
    $blog2 = BlogController::listarMais(3);
    $img = $blog['imagem'];
    $img2 = explode("-", $img);
    $pasta = substr($img2[1], 0, 7);
    $tags2 = [
        $blog['titulo'] . " | Blog",
        $blog['titulo'] . " - Blog",
        "author",
        "index",
        "follow"
    ];
    $meta = SEOTags::metaTags($tags2);

    return $this->view->render($response, "visualizar-noticia.html", [
        'meta' => $meta,
        'noticia' => $blog,
        'pasta' => $pasta,
        'description' => $blog['resumo'],
        'author' => $blog['autor'],
        'mais' => $blog2,
        'blogUrl' => true
    ]);

})->setName('blogConteudo');