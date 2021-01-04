<?php

namespace Analytics\Connection;
use Analytics\Connection\Connection;

class Sql 
{
    private static $sql;
    
    public static function query(?string $where, string $columns = "*", bool $fetchAll = false)
    {
        try {
            self::$sql = "SELECT $columns FROM tb_analytics";
            
            if (isset($where)) {
                self::$sql .= " WHERE $where;";
            }

            $stmt = Connection::query(self::$sql);
            $stmt->execute();
            
            if ($fetchAll == true) {
                $res = $stmt->fetchAll();
            } else {
                $res = $stmt->fetch();
            }

            #var_dump($res);
            #exit;
            return $res;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function insert(string $values)
    {
        try {
            self::$sql = "INSERT INTO tb_analytics (cod_id, users, views, pages) VALUES ($values);";
            
            // var_dump(self::$sql);
            // exit;
            $stmt = Connection::prepare(self::$sql);
            $res = $stmt->execute();

            return $res;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function update(string $users, string $id)
    {
        try {
            self::$sql = "UPDATE tb_analytics SET users = '$users' WHERE cod_id = '$id';";
            // var_dump(self::$sql);
            // exit;
            $stmt = Connection::prepare(self::$sql);
            $res = $stmt->execute();

            return $res;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updatePages(string $id)
    {
        try {
            self::$sql = "UPDATE tb_analytics SET `pages` = `pages` + 1 WHERE cod_id = '$id';";
            // var_dump(self::$sql);
            // exit;
            $stmt = Connection::prepare(self::$sql);
            $res = $stmt->execute();

            return $res;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}