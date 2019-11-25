<?php

require_once ROOT_PATH. '/Sources/DAO/ImovelDAO.php';

class ImovelController {
    public static function buscarImovel(string $estado, string $cidade, int $pagina, int $itens_pagina){
        $imovelDAO = new ImovelDAO();
        $res = $imovelDAO->getFindImovel($estado, $cidade, $pagina, $itens_pagina);

        return $res;
    }

    public static function listarTodos(){
        $imovelDAO = new ImovelDAO();
        $res = $imovelDAO->getAllImoveis();

        return $res;
    }
    
    public static function listar(int $id){
        $imovelDAO = new ImovelDAO();
        $res = $imovelDAO->getImoveisUsu($id);

        return $res;
    }

    public static function listarUnico(int $id){
        $imovelDAO = new ImovelDAO();
        $res = $imovelDAO->getImovelOnly($id);

        return $res;
    }
    
    public static function listarUnicoFoto(int $id){
        $imovelDAO = new ImovelDAO();
        $res = $imovelDAO->getImovelFoto($id);

        return $res;
    }

    public function inserir(Imovel $imovel){
        $imovelDAO = new ImovelDAO();
        $res = $imovelDAO->insert($imovel);

        return $res;
    }

    public function atualizar(Imovel $imovel, int $id){
        $imovelDAO = new ImovelDAO();
        $res = $imovelDAO->update($imovel, $id);

        return $res;
    }

    public static function excluir(int $id){
        $imovelDAO = new ImovelDAO();
        $res = $imovelDAO->delete($id);

        return $res;
    }
}