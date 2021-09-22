<?php
    /*  ---------------------------------------------------------------------------------------
        Function: Archive to set the connection with the mySQL database.
        Responsable: Israel
        Date: 15.09.21
    -------------------------------------------------------------------------------------------*/

    require_once('../db/mySQLconnection.php');

    function insertInMySQL($arrayCliente) {
        /* What is the $sql variable? (...)
         * The variable $sql is created and used to send a script to the mySQL database,
         * that insert the values from the web page to the database.
         * 
         * the script would looks like this:
         * insert into tblcliente(nome, rg, cpf, telefone, celular, email, obs) values($nome, $rg, $cpf, $telefone, $celular, $email, $obs);
         * 
         * In the values, the variables are the user's values, that are and colleted via PHP.*/

        $sql = "insert into tblcliente(nome,rg,cpf,telefone,celular,email,obs)
        values(
            '".$arrayCliente['nome']."',
            '".$arrayCliente['rg']."',
            '".$arrayCliente['cpf']."',
            '".$arrayCliente['telefone']."',
            '".$arrayCliente['celular']."',
            '".$arrayCliente['email']."',
            '".$arrayCliente['obs']."'
        )";
        
        /* What's the use of this echo()? (...)
            This echo() was used to see if the script was wrote properly.*/
        // echo($sql);

        $connection = mySQLconnection();
        mysqli_query($connection, $sql);
    }


?>