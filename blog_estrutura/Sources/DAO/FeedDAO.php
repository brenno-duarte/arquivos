<?php

require_once ROOT_PATH. '/Sources/Model/Feed.php';
require_once ROOT_PATH. '/Sources/DB/DB.php';

class FeedDAO {
    public function insert(Feed $feed){
        $sql = "INSERT INTO tb_feed (descricao) VALUES (:descricao)";

        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":descricao", $feed->getDescricao(), PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}