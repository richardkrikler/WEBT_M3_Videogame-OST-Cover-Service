<?php

class DB
{
    // name of the service from docker-compose.yml -> "mysql"
    private static string $SERVER = 'db';
    private static string $DBNAME = 'OSTS';
    private static string $USERNAME = 'root';
    private static string $PASSWORD = '';

    /**
     * @return PDO
     */
    public static function getDB(): PDO
    {
        $server = self::$SERVER;
        $dbname = self::$DBNAME;
        $username = self::$USERNAME;
        $password = self::$PASSWORD;

        try {
            // Connect with: Server, User, Password, Database
            $DB = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);

            // because default: errormode_silent, change to ERRMODE_EXCEPTION
            $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $DB;
        } catch (PDOException $e) {
            print('Error: ' . $e);
            exit();
        }
    }
}