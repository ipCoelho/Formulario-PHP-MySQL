<?php
    /*  ---------------------------------------------------------------------------------------
        Function: Archive to set the connection with the mySQL database.
        Responsable: Israel
        Date: 15.09.21
    -------------------------------------------------------------------------------------------*/


    // Function to open the connection with the Datebase mySQL.
    function mySQLconnection() {
        /* Why is this being imported? (...)
            " require_once('../functions/config.php'); " is being imported to get those variables
            that contains the information of the datebase, which is needed to make the connection
            between the backend and the datebase.*/
        require_once('../functions/config.php');
        
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