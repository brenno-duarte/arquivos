<?php

namespace Solital\Components\Model;
use Solital\Components\Model\Model;

class User extends Model
{
    public function __construct()
    {
        $this->table = "tb_admin";
        $this->columnPrimaryKey = "idAdmin";
        $this->columns = [];
    }

    public function listar()
    {
        return $this->instance()->select()->build("all");
    }
}