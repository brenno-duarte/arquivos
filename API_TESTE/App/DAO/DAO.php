<?php

require ROOT_PATH.'/App/DB/DB.php';

class DAO extends DB {
    public static function getAll(){
        $sql = "SELECT * FROM usuarios";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getOnly(int $id){
        $sql = "SELECT * FROM usuarios WHERE idUsu = $id";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function insert(Model $model){
        $sql = "INSERT INTO usuarios (nome,idade) VALUE (:nome,:idade)";

        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(':nome', $model->getNome());
            $stmt->bindValue(':idade', $model->getIdade());
            $res = $stmt->execute();

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function update(Model $model, int $id){
        $sql = "UPDATE usuarios set 
        nome = :nome, 
        idade = :idade WHERE idUsu = $id";

        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(':nome', $model->getNome());
            $stmt->bindValue(':idade', $model->getIdade());
            $res = $stmt->execute();

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function delete(int $id){
        $sql = "DELETE FROM usuarios WHERE idUsu = $id";

        try {
            $stmt = DB::prepare($sql);
            $res = $stmt->execute();

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
