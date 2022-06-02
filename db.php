<?php

    function connDB() {
        // FOR LOCAL HOST ON MY MACHINE
        $username = "root";
        $password = "Sdan3189";
        $dsn = 'mysql:dbname=shahafster;host=127.0.0.1;port=3306;socket=/tmp/mysql.sock';        
        try {$conn = new PDO($dsn, $username, $password);}
        catch(PDOException $e) {return $e;}
        return $conn;


        // FOR 000WEBHOSTING ON THE WEB
        // $servername = "sql5.freemysqlhosting.net";
        // $username = "sql5396493";
        // $password = "TZRVXNLpNq";
        // $database = "sql5396493";
        // try { 
        //     $conn = new PDO("mysql:host=".$servername.";dbname=".$database, $username, $password);
        //     $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // }
        // catch (PDOException $e) {
        //     // echo "Database Connection Failed";
        //     return $e;
        // }
        // return $conn;
    }



?>