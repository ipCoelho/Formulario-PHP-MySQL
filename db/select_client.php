<?php
    /*-------------------------------------------------------------------------------------------
    Objective: This file is responsible to construct the 'brigde' between the datebase and the
    PHP.

    Responsible: Israel
    Date: 23.09.21
    ---------------------------------------------------------------------------------------------*/
    /* Why is this being imported? (...)
        This file is being imported to use the function 'mySQLconnection()' */
    require_once(src.'/db/mySQLconnection.php');

    // Function to list (to select) the clients from the datebase.
    function selectFromTheDatebase() {
        // Script 
        $scriptSql = "select * from tblcliente order by idcliente desc";

        // Open the connection with the DB.
        $connection = mySQLconnection();

        // Variable to storage the array that'll be recieved from mysqli_connect().
        $select = mysqli_query($connection, $scriptSql);
        return $select;
    }

    function searchFromTheDatebase($id) {
        $scriptSql = "select * from tblcliente where idcliente=".$id;

        $connection = mySQLconnection();
        $select = mysqli_query($connection, $scriptSql);
        
        return $select;
    }


?>