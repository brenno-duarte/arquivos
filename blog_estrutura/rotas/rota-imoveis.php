<?php

require_once ROOT_PATH. '/Sources/Controller/DenunciaController.php';
require_once ROOT_PATH. '/Sources/Controller/ImovelController.php';
require_once ROOT_PATH. '/Sources/Model/Imovel.php';
require_once ROOT_PATH. '/Sources/Controller/FotoController.php';
require_once ROOT_PATH. '/Sources/Model/Foto.php';

$app->get('/novo-imovel', function($request, $response){

    if ($_SESSION['idUsu']) {
        $pathFotos = ROOT_PATH."/views/views-conta/fotos/".$_SESSION['emailUsu']."/";
        
        if (!is_dir($pathFotos)) {
            mkdir($pathFotos, 0777);
        }
        
        $dir = new DirectoryIterator($pathFotos);
        $estados = CidadeController::listarEstados();

        $msg = $this->flash->getFirstMessage('limite1');
        return $this->view->render($response, "views-conta/novo-imovel.html", [
            'title' => 'Novo imóvel',
            'fotos' => $dir,
            'estado' => $estados,
            'email' => $_SESSION['emailUsu'],
            'idUsuario' => $_SESSION['idUsu'],
            'msg' => $msg
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('novoImovel');

$app->post('/novo-imovel', function($request, $response){

    if ($_SESSION['idUsu']) {

        $pathFotos = ROOT_PATH."/views/views-conta/fotos/".  $_SESSION['emailUsu'] ."/";
        $arquivo = $_FILES['foto'];
        $nomeFoto = count($arquivo['name']);
        
        if ($nomeFoto > 5) {
            $this->flash->addMessage('limite1', 'Limite de fotos atingido');
            return $response->withRedirect($this->router->pathFor('novoImovel'));
            die();
        }

        if (!is_dir($pathFotos)) {
            mkdir($pathFotos, 0777);
        }

        $idUsu = filter_input(INPUT_POST, 'idUsu');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $cidade = filter_input(INPUT_POST, 'cidade');
        $rua = filter_input(INPUT_POST, 'rua');
        $bairro = filter_input(INPUT_POST, 'bairro');
        $estado = filter_input(INPUT_POST, 'estado');
        $numero = filter_input(INPUT_POST, 'numero');
        $valor = filter_input(INPUT_POST, 'valor');

        $imovelCon = new ImovelController();
        $imovel = new Imovel();
        $imovel->setIdUsuario($idUsu);
        $imovel->setDescricao($descricao);
        $imovel->setCidade($cidade);
        $imovel->setRua($rua);
        $imovel->setBairro($bairro);
        $imovel->setEstado($estado);
        $imovel->setNumero($numero);
        $imovel->setTipo('Alugar');
        $imovel->setValor($valor);
        $idImovel = $imovelCon->inserir($imovel);

        for ($i=0; $i < $nomeFoto; $i++) { 

            $ext = explode(".", $arquivo['name'][$i]);
            $end = end($ext);
            $novoNome = uniqid("IMG-".date('dmY')). "." .$end;

            if (move_uploaded_file($arquivo['tmp_name'][$i], $pathFotos.'/'.$novoNome)) {
                $foto = new Foto();
                $fotoCon = new FotoController();
        
                $foto->setIdImovel($idImovel);
                $foto->setIdUsu($idUsu);
                $foto->setNomeFoto($novoNome);

                $fotoCon->inserir($foto);
            } else {
                echo "Erro ao enviar arquivo";
            }
        }

        $this->flash->addMessage('imovelInserido', 'Imóvel adicionado com sucesso');
        return $response->withRedirect($this->router->pathFor('painel'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
    
})->setName('novoImovel');

$app->get('/editar-imovel/{id}', function($request, $response, $args){

    if ($_SESSION['idUsu']) {
        $res = ImovelController::listarUnico($args['id']);
        $fotos = FotoController::listar($args['id']);
        $estados = CidadeController::listarEstados();

        $msg = $this->flash->getFirstMessage('limite2');
        return $this->view->render($response, "views-conta/editar-imovel.html", [
            'title' => 'Editar imóvel',
            'imovel' => $res,
            'fotos' => $fotos,
            'estado' => $estados,
            'listEst' => $res['estado'],
            'email' => $_SESSION['emailUsu'],
            'idUsuario' => $_SESSION['idUsu'],
            'msg' => $msg
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('editarImovel');

$app->post('/editar-imovel/{id}', function($request, $response, $args){

    if ($_SESSION['idUsu']) {
        $arquivo = $_FILES['foto'];  
        $idImovel = $args['id'];
        $idUsu = filter_input(INPUT_POST, 'idUsu');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $cidade = filter_input(INPUT_POST, 'cidade');
        $rua = filter_input(INPUT_POST, 'rua');
        $bairro = filter_input(INPUT_POST, 'bairro');
        $estado = filter_input(INPUT_POST, 'estado');
        $numero = filter_input(INPUT_POST, 'numero');
        $valor = filter_input(INPUT_POST, 'valor');

        $res = FotoController::listarQnt($idImovel);

        foreach ($res as $res) {    
            if ($res['qnt'] >= 5) {
                $this->flash->addMessage('limite2', 'Limite de fotos atingido');
                return $response->withRedirect($this->router->pathFor('editarImovel', (['id' => $idImovel])));
                die();
            }
        }

        $pathFotos = ROOT_PATH."/views/views-conta/fotos/".  $_SESSION['emailUsu'] ."/";
        $nomeFoto = count($arquivo['name']);

        if (!is_dir($pathFotos)) {
            mkdir($pathFotos, 0777);
        }

        if (!empty($arquivo['name']) && isset($arquivo)) {
            for ($i=0; $i < $nomeFoto; $i++) {

                $ext = explode(".", $arquivo['name'][$i]);
                $end = end($ext);
                $novoNome = uniqid("IMG-".date('dmY')). "." .$end;

                if (move_uploaded_file($arquivo['tmp_name'][$i], $pathFotos.'/'.$novoNome)) {
                    $foto = new Foto();
                    $fotoCon = new FotoController();
            
                    $foto->setIdImovel($idImovel);
                    $foto->setIdUsu($idUsu);
                    $foto->setNomeFoto($novoNome);

                    $fotoCon->inserir($foto);
                }        
            } 
        } else {
            echo 'error';
        }
        
        $imovelCon = new ImovelController();
        $imovel = new Imovel();
        $imovel->setIdUsuario($idUsu);
        $imovel->setDescricao($descricao);
        $imovel->setCidade($cidade);
        $imovel->setRua($rua);
        $imovel->setBairro($bairro);
        $imovel->setEstado($estado);
        $imovel->setNumero($numero);
        $imovel->setTipo('Alugar');
        $imovel->setValor($valor);
        $res = $imovelCon->atualizar($imovel, $idImovel);
        #var_dump($res);

        $this->flash->addMessage('imovelAlterado', 'Imóvel alterado com sucesso');
        return $response->withRedirect($this->router->pathFor('painel'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('editarImovel');

$app->get('/excluirImovel/{id}', function($request, $response, $args){
    
    if ($_SESSION['idUsu']) {
        $fotos = FotoController::listar($args['id']);
        
        foreach ($fotos as $foto) {
            $nome = $foto['nomeFoto'];
            $pathFotos = ROOT_PATH."/views/views-conta/fotos/".  $_SESSION['emailUsu'] ."/". $nome;
            unlink($pathFotos);
        }

        ImovelController::excluir($args['id']);

        $this->flash->addMessage('imovelDeletado', 'Imóvel deletado com sucesso');
        return $response->withRedirect($this->router->pathFor('painel'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('excluirImovel');

$app->get('/excluirFoto/{nome}[/{id}]', function($request, $response, $args){
    
    if ($_SESSION['idUsu']) {
        $id = $args['id'];
        $nome = $args['nome'];

        FotoController::excluir($nome);
        $pathFotos = ROOT_PATH."/views/views-conta/fotos/".  $_SESSION['emailUsu'] ."/". $nome;
        unlink($pathFotos);

        return $response->withRedirect($this->router->pathFor('editarImovel', (['id' => $id])));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('excluirFoto');

$app->get('/denunciar-imovel/{id}', function($request, $response, $args){

    $res = ImovelController::listarUnico($args['id']);
    
    return $this->view->render($response, "denunciar.html", [
        'title' => 'Denunciar imóvel',
        'imovel' => $res['idImovel'],
        'nome' => $res['nomeUsu']
    ]);

})->setName('denunciarImovel');

$app->post('/denunciar-imovel/{id}', function($request, $response, $args){

    $idImovel = filter_input(INPUT_POST, 'idImovel');
    $motivo = filter_input(INPUT_POST, 'motivo');

    $denDAO = new DenunciaController();
    $denuncia = new Denuncia();
    $denuncia->setMotivo($motivo);
    $denDAO->inserir($denuncia, $idImovel);

    return $this->view->render($response, "denuncia-conf.html", [
        'title' => 'Imóvel denunciado'
    ]);

})->setName('denunciarImovel');