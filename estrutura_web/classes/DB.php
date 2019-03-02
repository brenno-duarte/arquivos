<?php

require_once 'Config.php';

class DB
{

	private static $con;

	public static function conectar()
	{
		if (!isset(self::$con)) {
			try {
				self::$con = new PDO(DB_DRIVE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
				self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return self::$con;
			} catch (PDOException $e) {
				echo "<h2 style='color:red;'>Erro no banco!!! </h3>" . $e->getMessage(). "<br> <h2 style='color:red;'>Verificar a conexao com o banco (arquivo Config.php)</h2>";
				die();
			}
		}

		return self::$con;
	}

	public static function prepare($sql)
	{
		return $stmt = DB::conectar()->prepare($sql);
	}
	
}