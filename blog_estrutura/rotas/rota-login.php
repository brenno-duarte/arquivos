<?php

require_once ROOT_PATH. '/Sources/Controller/UsuarioController.php';
require_once ROOT_PATH. '/Sources/Controller/CidadeController.php';
require_once ROOT_PATH. '/Sources/Model/Usuario.php';

$app->get('/login', function($request, $response){
    
    if (!isset($_SESSION['idUsu'])) {
        $tags2 = [
            "Entrar - Imóveis avista",
            "Login no Imóveis avista",
            "Brenno Duarte de Lima",
            "index",
            "follow"
        ];
        $meta = SEOTags::metaTags($tags2);
        $msg1 = $this->flash->getFirstMessage('erroLogin');
        $msg2 = $this->flash->getFirstMessage('contaDeletada');
        $msg3 = $this->flash->getFirstMessage('senhaAlt');

        return $this->view->render($response, "login.html", [
            'meta' => $meta,
            'msg1' => $msg1,
            'msg2' => $msg2,
            'msg3' => $msg3
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('painel'));
    }

})->setName('login');

$app->post('/login', function($request, $response){

    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');

    $validar = UsuarioController::login($email, $senha);
    
    if (isset($validar)) {
        $_SESSION['idUsu'] = $validar['idUsu'];
        $_SESSION['nomeUsu'] = $validar['nomeUsu'];
        $_SESSION['emailUsu'] = $validar['email'];
        $_SESSION['senhaUsu'] = $validar['senha'];
        $_SESSION['contatoUsu'] = $validar['contato'];
        setcookie('nome', $validar['nomeUsu']);
        return $response->withRedirect($this->router->pathFor('painel'));
    } else {
        $this->flash->addMessage('erroLogin', 'E-mail e/ou senha incorretos');
        return $response->withRedirect($this->router->pathFor('login'));
    }
    
})->setName('login');

$app->get('/logout', function($request, $response){

    setcookie("nomeUsu", NULL, -1);
    setcookie("nomeAdm", NULL, -1);
    session_destroy();
    return $response->withRedirect($this->router->pathFor('admin'));

})->setName('logout');
