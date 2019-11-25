<?php

require_once ROOT_PATH. '/Sources/DAO/DenunciaDAO.php';

class DenunciaController {
    public function inserir(Denuncia $denuncia, int $id){
        $denunciaDAO = new DenunciaDAO();
        $res = $denunciaDAO->insert($denuncia, $id);

        return $res;
    }
}