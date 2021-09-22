<?php
    /*  ---------------------------------------------------------------------------------------
        Function: Archive to set the connection with the mySQL database.
        Responsable: Israel
        Date: 15.09.21
    -------------------------------------------------------------------------------------------*/


    // Function to open the connection with the Datebase mySQL.
    function mySQLconnection() {
        // Variable's declaration to connect with the Datebase.
        $server = (string) DB_SERVER;
        $user = (string) DB_USER;
        $password = (string) DB_PASSWORD;
        $datebase = (string) DB_DATABASE;

        if ($connection = mysqli_connect($server, $user, $password, $datebase)) {
            return $connection;
        } else {
            return false;
            echo(ERROR_DB_CONNECTION);
        }
    }

    /* Ways to create the connection with the Database (...)

        mysql_connect();
            "Old, should'nt be used, isn't safe."

        mysqli_connect();
            "Can be used in 'OOP' and also procedural programming."

        PDO();
            "Newer and safer library, can be used to connect with any Datebase. 
            It can only be used in 'OOP'." */
?>