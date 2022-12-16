<?php

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "12345678");
define("BD", "SysMot");
// define("USER", "id20023786_ambiente_qas_is");
// define("PASSWORD", "QLzde?x{7Ggal1#\\");
// define("BD", "id20023786_sysmot");
class DbConnection
{
    private static $connection;

    private function __construct()
    {
    }

    public static function connect()
    {
        if (self::$connection == null) {
            try {
                $connectionString = "mysql:host=" . HOST . ";dbname=" . BD . ";charset=utf8mb4";
                self::$connection = new PDO($connectionString, USER, PASSWORD);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $th) {
                print_r("ERROR: " . $th->getMessage());
            }
        }
        return self::$connection;
    }
}
