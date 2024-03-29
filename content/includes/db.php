<?php
class DB {
    private static function connect () {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=skole;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query, $param = array()) {
        $statement = self::connect()->prepare($query);
        $statement->execute($param);

        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }
}