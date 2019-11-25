<?php

require_once ROOT_PATH. '/Sources/Controller/BlogController.php';
require_once ROOT_PATH. '/Sources/Controller/AdminController.php';
require_once ROOT_PATH. '/Sources/Model/Blog.php';

$app->get('/admin', function($request, $response){

    $msg1 = $this->flash->getFirstMessage('erroLoginG');
    return $this->view->render($response, "views-gestor/login.html", [
        'title' => 'Login no Blog',
        'msg1' => $msg1
    ]);

})->setName('admin');

$app->post('/admin', function($request, $response){

    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');
    $validar = AdminController::login($email, $senha);
    
    if (isset($validar)) {
        $_SESSION['idAdm'] = $validar['idAdm'];
        $_SESSION['nomeAdm'] = $validar['nomeAdm'];
        $_SESSION['emailAdm'] = $validar['emailAdm'];
        $_SESSION['senhaAdm'] = $validar['senhaAdm'];
        $_SESSION['contatoAdm'] = $validar['contatoAdm'];
        $_SESSION['acesso'] = $validar['acesso'];
        setcookie('nomeAdm', $validar['nomeAdm']);
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    } else {
        $this->flash->addMessage('erroLoginG', 'E-mail e/ou senha incorretos');
        return $response->withRedirect($this->router->pathFor('admin'));
    }
    
})->setName('admin');

$app->get('/admin/posts', function($request, $response){

    if ($_SESSION['idAdm']) {
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
        
        $msg1 = $this->flash->getFirstMessage('postAdd');
        $msg2 = $this->flash->getFirstMessage('postAlt');
        $msg3 = $this->flash->getFirstMessage('postDel');
        $msg4 = $this->flash->getFirstMessage('erroAcesso');
        return $this->view->render($response, "views-gestor/painel-blog.html", [
            'title' => 'Painel do Blog',
            'noticias' => $blog,
            'msg1' => $msg1,
            'msg2' => $msg2,
            'msg3' => $msg3,
            'msg4' => $msg4,
            'pag_atual' => $pagina_atual,
            'valorAnt1' => $vA1,
            'valorAnt2' => $vA2,
            'valorPost1' => $vP1,
            'valorPost2' => $vP2,
            'qntPag' => $qnt_pag
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('adminPainel');

$app->get('/admin/posts/novo', function($request, $response){

    if ($_SESSION['idAdm']) {
        $blog = BlogController::listar();

        return $this->view->render($response, "views-gestor/novo-post.html", [
            'title' => 'Novo post',
            'noticias' => $blog,
            'autor' => $_SESSION['nomeAdm']
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('adminPainelNovo');

$app->post('/admin/posts/novo', function($request, $response){

    if ($_SESSION['idAdm']) {
        $pathFotos = ROOT_PATH."/views/views-gestor/fotos-blog/".date("M").date("Y")."/";
        $arquivo = $_FILES['foto'];
        $titulo = filter_input(INPUT_POST, 'titulo');
        $resumo = filter_input(INPUT_POST, 'resumo');
        $autor = filter_input(INPUT_POST, 'autor');
        $conteudo = filter_input(INPUT_POST, 'conteudo');
        $nome_imagem = filter_input(INPUT_POST, 'nomeImg');
        $data = date("d/m/Y");
        $res = explode("/", $data);
        $res2 = array_reverse($res);
        $dataFormatada = implode("-", $res2);  

        if (!is_dir($pathFotos)) {
            umask(0);
            mkdir($pathFotos, 0777);
        }

        $ext = explode(".", $arquivo['name']);
        $end = end($ext);
        $novoNome = uniqid("IMG-".date("M").date("Y")). "." .$end;

        $blogC = new BlogController();
        $res = $blogC->inserir($titulo, $resumo, $autor, $conteudo, $dataFormatada, $novoNome, $nome_imagem);

        if (move_uploaded_file($arquivo['tmp_name'], $pathFotos.'/'.$novoNome)) {
            echo 'deu certo';
        } else {
            echo "Erro ao enviar arquivo";
        }

        $this->flash->addMessage('postAdd', 'Post publicado com sucesso');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('adminPainelNovo');

$app->get('/admin/posts/alterar/{id}', function($request, $response, $args){

    if ($_SESSION['idAdm']) {
        $blog = BlogController::listarUnico($args['id']);
        $img = $blog['imagem'];
        $img2 = explode("-", $img);
        $pasta = substr($img2[1], 0, 7);

        $msg = $this->flash->getFirstMessage('postFotoDel');
        return $this->view->render($response, "views-gestor/editar-post.html", [
            'title' => 'Editar post',
            'noticia' => $blog,
            'autor' => $_SESSION['nomeAdm'],
            'pasta' => $pasta,
            'imagemAtual' => $img,
            'msg' => $msg
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('adminPainelEditar');

$app->post('/admin/posts/alterar/{id}', function($request, $response, $args){

    if ($_SESSION['idAdm']) {
        $pasta = filter_input(INPUT_POST, 'pasta');
        $pathFotos = ROOT_PATH."/views/views-gestor/fotos-blog/".$pasta."/";
        $arquivo = $_FILES['foto'];
        $titulo = filter_input(INPUT_POST, 'titulo');
        $resumo = filter_input(INPUT_POST, 'resumo');
        $autor = filter_input(INPUT_POST, 'autor');
        $conteudo = filter_input(INPUT_POST, 'conteudo');
        $imagemAtual = filter_input(INPUT_POST, 'imagemAtual');
        $nome_imagem = filter_input(INPUT_POST, 'nomeImg');
        $data = date("d/m/Y");
        $res = explode("/", $data);
        $res2 = array_reverse($res);
        $dataFormatada = implode("-", $res2);  

        if (!is_dir($pathFotos)) {
            umask(0);
            mkdir($pathFotos, 0777);
        }
        
        if (!empty($arquivo['name'])) {
            $ext = explode(".", $arquivo['name']);
            $end = end($ext);
            $novoNome = uniqid("IMG-".date("M").date("Y")). "." .$end;

            $pathImgAtual = ROOT_PATH."/views/views-gestor/fotos-blog/".$pasta."/".$imagemAtual;
            $pathImgNovo = ROOT_PATH."/views/views-gestor/fotos-blog/".$pasta."/".$novoNome;
            rename($pathImgAtual, $pathImgNovo);
            
            $blogC = new BlogController();
            $res = $blogC->alterar($titulo, $resumo, $autor, $conteudo, $dataFormatada, $novoNome, $nome_imagem, $args['id']);
            var_dump($res);
            echo '<br>';
            #var_dump($titulo, $resumo, $autor, $conteudo, $dataFormatada, $novoNome, $nome_imagem, $args['id']);
        
            if (move_uploaded_file($arquivo['tmp_name'], $pathFotos.'/'.$novoNome)) {
                echo 'deu certo';
            } else {
                echo "Erro ao enviar arquivo";
            }
        
            $this->flash->addMessage('postAlt', 'Post alterado com sucesso');
            return $response->withRedirect($this->router->pathFor('adminPainel'));
        } else {

            $blogC = new BlogController();
            $res = $blogC->alterar($titulo, $resumo, $autor, $conteudo, $dataFormatada, $imagemAtual, $nome_imagem, $args['id']);
            var_dump($res);
            echo '<br>';

            $this->flash->addMessage('postAlt', 'Post alterado com sucesso');
            return $response->withRedirect($this->router->pathFor('adminPainel'));
        }
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }
    
})->setName('adminPainelEditar');

$app->get('/admin/posts/excluir/{id}', function($request, $response, $args){
    
    if ($_SESSION['idAdm']) {
        $blog = BlogController::listarUnico($args['id']);
        #echo '<pre>';
        $img = $blog['imagem'];
        $img2 = explode("-", $img);
        $pasta = substr($img2[1], 0, 7);

        BlogController::excluir($args['id']);
        $pathFotos = ROOT_PATH."/views/views-gestor/fotos-blog/".$pasta."/".$img;
        unlink($pathFotos);

        $this->flash->addMessage('postDel', 'Post deletado com sucesso');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('adminPainelExcluir');

$app->get('/excluir-foto/{pasta}/{nome}/{id}', function($request, $response, $args){
    
    if ($_SESSION['idAdm']) {
        $id = $args['id'];
        $pasta = $args['pasta'];
        $nome = $args['nome'];
        $pathFotos = ROOT_PATH."/views/views-gestor/fotos-blog/".$pasta."/".$nome;
        unlink($pathFotos);

        $this->flash->addMessage('postFotoDel', 'Foto deletado com sucesso (talvez você ainda verá a foto até recarregar a página)');
        return $response->withRedirect($this->router->pathFor('adminPainelEditar', (['id' => $id])));
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('excluirFotoBlog');