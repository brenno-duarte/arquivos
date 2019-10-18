<?php

require_once ROOT_PATH. '/Sources/Model/Denuncia.php';
require_once ROOT_PATH. '/Sources/DB/DB.php';

class DenunciaDAO {
    public function insert(Denuncia $denuncia, int $id){
        $sql = "INSERT INTO tb_denuncia (idImovel, motivo) VALUES ($id, :motivo)";

        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":motivo", $denuncia->getMotivo(), PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}