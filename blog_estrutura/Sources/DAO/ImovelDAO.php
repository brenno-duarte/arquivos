<?php

require_once ROOT_PATH. '/Sources/Model/Imovel.php';
require_once ROOT_PATH. '/Sources/DB/DB.php';

class ImovelDAO {
    public function getFindImovel(string $estado, string $cidade, int $pagina, int $itens_pagina){
        $sql = "SELECT * FROM tb_imovel a INNER JOIN tb_usuario b ON a.idUsu = b.idUsu
        WHERE a.estado LIKE '%$estado%' AND a.cidade LIKE '%$cidade%' LIMIT $pagina, $itens_pagina";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getAllImoveis(){
        $sql = "SELECT * FROM tb_imovel";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getImoveisUsu(int $id){
        $sql = "SELECT * FROM tb_imovel WHERE idUsu = $id";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getImovelOnly(int $id){
        $sql = "SELECT * FROM tb_imovel a INNER JOIN tb_usuario b
        ON a.idUsu=b.idUsu WHERE a.idImovel = $id";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getImovelFoto(int $id){
        $sql = "SELECT * FROM tb_imovel a INNER JOIN tb_usuario b INNER JOIN tb_foto c ON a.idUsu = b.idUsu 
        AND a.idImovel = c.idImovel WHERE a.idImovel = $id";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insert(Imovel $imovel){
        $sql = "INSERT INTO tb_imovel (idUsu, rua, descricao, cidade, bairro, 
            estado, numero, tipo, valor) VALUES (:idUsu, :rua, :descricao, :cidade, :bairro, 
            :estado, :numero, :tipo, :valor)";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(':idUsu', $imovel->getIdUsuario(), PDO::PARAM_INT);
            $stmt->bindValue(':rua', $imovel->getRua(), PDO::PARAM_STR);
            $stmt->bindValue(':descricao', $imovel->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(':cidade', $imovel->getCidade(), PDO::PARAM_STR);
            $stmt->bindValue(':bairro', $imovel->getBairro(), PDO::PARAM_STR);
            $stmt->bindValue(':estado', $imovel->getEstado(), PDO::PARAM_STR);
            $stmt->bindValue(':numero', $imovel->getNumero(), PDO::PARAM_STR);
            $stmt->bindValue(':tipo', $imovel->getTipo(), PDO::PARAM_STR);
            $stmt->bindValue(':valor', $imovel->getValor(), PDO::PARAM_STR);
            $stmt->execute();
            $idInsert = DB::lastInsertId();

            return $idInsert;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(Imovel $imovel, int $id){
        $sql = "UPDATE tb_imovel SET 
        idUsu = :idUsu, 
        rua = :rua, 
        descricao = :descricao, 
        cidade = :cidade, 
        bairro = :bairro, 
        estado = :estado, 
        numero = :numero, 
        tipo = :tipo, 
        valor = :valor WHERE idImovel = $id";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(':idUsu', $imovel->getIdUsuario(), PDO::PARAM_INT);
            $stmt->bindValue(':rua', $imovel->getRua(), PDO::PARAM_STR);
            $stmt->bindValue(':descricao', $imovel->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(':cidade', $imovel->getCidade(), PDO::PARAM_STR);
            $stmt->bindValue(':bairro', $imovel->getBairro(), PDO::PARAM_STR);
            $stmt->bindValue(':estado', $imovel->getEstado(), PDO::PARAM_STR);
            $stmt->bindValue(':numero', $imovel->getNumero(), PDO::PARAM_STR);
            $stmt->bindValue(':tipo', $imovel->getTipo(), PDO::PARAM_STR);
            $stmt->bindValue(':valor', $imovel->getValor(), PDO::PARAM_STR);

            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete(int $id){
        $sql = "CALL deletar_imovel($id)";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
