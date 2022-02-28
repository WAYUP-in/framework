<?php

namespace App\System\Database;


class ORM
{
    private static \PDO $db;

    public static function connect(string $user, string $password, string $database, string $driver = 'mysql', string $host = 'localhost', int $port = 3306)
    {
        self::$db = new \PDO("$driver:host=$host:$port;dbname=$database", $user, $password);
    }

    public static function insert(string $table, array $data): void
    {
        $columns = array_map(function ($key) {
            return "`$key`";
        }, array_keys($data));

        $params = array_map(function ($key) {
            return ":$key";
        }, array_keys($data));

        $query = "INSERT INTO `$table` (" . implode(',', $columns) . ") VALUES (" . implode(',', $params) . ")";

        $q = self::$db->prepare($query);
        $q->execute($data);
    }

    public static function find(string $table, array $args = []): bool|array
    {
        $query = "SELECT * FROM `$table` ";
        if (!empty($args)) {
            $query .= 'WHERE ';
            $keys = array_keys($args);
            $params = array_map(function ($key) {
                return "`$key` = :$key";
            }, $keys);
            $query .= implode('AND', $params);
        }
        $query .= " LIMIT 1";
        $q = self::$db->prepare($query);
        $q->execute($args);
        $el = $q->fetch(\PDO::FETCH_ASSOC);
        return $el;
    }

    public static function update(string $table, array $data, array $args = [])
    {
        $query = "UPDATE `$table` SET ";
        $keys = array_keys($data);
        $params = array_map(function ($key) {
            return "`$key` = :$key";
        }, $keys);
        $query .= implode(',', $params);
        if (!empty($args)) {
            $query .= ' WHERE ';
            $keys = array_keys($args);
            $params = array_map(function ($key) {
                return "`$key` = :$key";
            }, $keys);
            $query .= implode('AND', $params);
        }
        $q = self::$db->prepare($query);
        $q->execute(array_merge($data, $args));
    }
}