<?php

namespace classes;
class Database
{
    private static $connection;

    public static function connect()
    {
        if (empty(self::$connection)) {
            self::$connection = mysqli_connect("localhost", "root", "", "bulletinboard");// Соединение с бд
        } elseif (!(self::$connection)) {
            die ('No connection established. Try again.' . mysqli_connect_error());
        }
    }

    public static function query($sqlString)
    {
        return mysqli_query(self::$connection, $sqlString);
    }

    public
    static function fetch($query)
    {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    protected
    static function escape($parameter)
    {
        return mysqli_real_escape_string(self::$connection, $parameter);
    }
}