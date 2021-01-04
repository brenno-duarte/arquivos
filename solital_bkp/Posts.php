<?php

namespace Solital\Components\Model;
use Solital\Components\Model\Model;

class Posts extends Model
{
    public function __construct()
    {
        $this->table = "tb_blog";
        $this->columnPrimaryKey = "idNot";
        $this->columns = [];
    }

    public function listar()
    {
        return $this->instance()->select()->build("all");
    }
}