<?php

namespace App;

class DbConnect
{
    private static ?\PDO $db = null;

    public static function getDb(): ?\PDO
    {
        if (self::$db === null) {
            try {
                self::$db = new \PDO(
                    'mysql:host=localhost;dbname=draft-shop;charset=utf8',
                    'root',
                    ''
                );
                self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }
        }
        return self::$db;
    }
}
