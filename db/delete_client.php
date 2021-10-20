<?php
    /*---------------------------------DATEBASE---------------------------------------------------
    Objective: Delete client date from the datebase.

    Responsible: Israel
    Date: 23.09.21
    ---------------------------------------------------------------------------------------------*/
    require_once('../db/mySQLconnection.php');

    /* What does this function do? (...)
        This function will be used to delete the Client's Date
        from the datebase.*/

    function delete($idClient) {
        $sql = "delete from tblcliente where idcliente = $idClient";
        $connection = mySQLconnection();

        if (mysqli_query($connection, $sql)) {
            return true;
        } else { 
            return false; 
        }
    }
?>