<?php

require ROOT_PATH.'/App/DAO/DAO.php';
require ROOT_PATH.'/App/Model/Model.php';

class Controller {
	public function listar($request, $response){
		$listar = DAO::getAll();
		$res = $response->withJson($listar);
		
		return $res;
	}

	public function listarUnico($request, $response){
		$id = $request->getAttribute('id');
		
		$listar = DAO::getOnly($id);
		$res = $response->withJson($listar);

		return $res;
	}

	public function inserir($request, $response){
		$nome = $request->getParam('nome');
		$idade = $request->getParam('idade');
		
		$model = new Model();
		$model->setNome($nome);
		$model->setIdade($idade);

		$listar = DAO::insert($model);
		$res = $response->withJson([
			'msg' => 'Cadastrado com sucesso'
		]);

		return $res;
	}

	public function alterar($request, $response){
		$id = $request->getAttribute('id');
		$nome = $request->getParam('nome');
		$idade = $request->getParam('idade');
		
		$model = new Model();
		$model->setNome($nome);
		$model->setIdade($idade);

		$listar = DAO::update($model, $id);
		$res = $response->withJson([
			'msg' => 'Alterado com sucesso'
		]);

		return $res;
	}

	public function deletar($request, $response){
		$id = $request->getAttribute('id');

		$listar = DAO::delete($id);
		$res = $response->withJson([
			'msg' => 'Deletado com sucesso'
		]);

		return $res;
	}
}
