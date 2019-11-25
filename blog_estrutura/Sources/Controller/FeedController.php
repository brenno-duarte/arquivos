<?php

require_once ROOT_PATH. '/Sources/DAO/FeedDAO.php';

class FeedController {
    public function inserir(Feed $feed){
        $feedDAO = new FeedDAO();
        $res = $feedDAO->insert($feed);

        return $res;
    }
}