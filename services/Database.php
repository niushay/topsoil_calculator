<?php
namespace Services;

use mysqli;
use mysqli_sql_exception;

class Database
{
    const DB_HOST = '127.0.0.1:3306';
    const DB_DATABASE = 'freetimers';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    private $connect;

    public function __construct()
    {
        try {
            $this->connect = new mysqli(self::DB_HOST, self::DB_USERNAME, self::DB_PASSWORD, self::DB_DATABASE);
        } catch (mysqli_sql_exception $e) {
            echo "MySQLi Error Code: " . $e->getCode() . "<br />";
            echo "Exception Msg: " . $e->getMessage();
            exit;
        }
    }

    public function createTable($tableName)
    {
        mysqli_select_db($this->connect, self::DB_DATABASE);
        $sql = "CREATE TABLE IF NOT EXISTS `$tableName` (
                  `id` INT (10) unsigned NOT NULL AUTO_INCREMENT,
                  `length` double NOT NULL,
                  `width` double NOT NULL,
                  `measurement_unit` varchar(30) NOT NULL,
                  `depth_meaurement_unit` varchar(30) NOT NULL,
                  `bags_count` INT(10) NOT NULL,     
                  `cost` varchar(20) NOT NULL,  
                  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                  PRIMARY KEY (`id`))";
        mysqli_query($this->connect, $sql);
    }

    public function insert($width, $length, $measurementUnit, $depthMeasurementUnit, $bagsCount, $cost)
    {
        $this->createTable('topsoil_bags');
        $statement = mysqli_prepare($this->connect,
            "INSERT INTO `topsoil_bags` (`length`, `width`, `measurement_unit`, `depth_meaurement_unit`, `bags_count`, `cost`) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($statement, 'ddssis', $length, $width, $measurementUnit, $depthMeasurementUnit, $bagsCount, $cost);
        mysqli_stmt_execute($statement);

        return true;
    }
}