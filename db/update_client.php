<?php
    /*-----------------------------------------------------------------------------------------------
    Objective: Archive responsible for updating information about the client on the Datebase.
    Responsible: Israel
    Date: 13.10.21
    ---------------------------------------------------------------------------------------------*/

    require_once(src.'db/mySQLconnection.php');

    function updateInMySQL($arrayCliente) {
    /* What's this $sql variable? (...)
     * The variable $sql is created and used to send a script to the mySQL database,
     * that insert the values from the web page to the database.
     * 
     * the script would looks like this:
     * insert into tblcliente(nome, rg, cpf, telefone, celular, email, obs) values($nome, $rg, $cpf, $telefone, $celular, $email, $obs);
     * 
     * In the values, the variables are the user's values, that are and colleted via PHP.*/

    $sql = "update tblcliente set
                nome = '" .$arrayCliente['nome']. "',
                rg = '" .$arrayCliente['rg']. "',
                cpf = '" .$arrayCliente['cpf']."',
                telefone = '" .$arrayCliente['telefone']. "',
                celular = '" .$arrayCliente['celular']. "',
                email = '" .$arrayCliente['email']. "',
                obs = '" .$arrayCliente['obs']. "' 
                
                where idcliente = " . $arrayCliente['id'];
    
    /* What's the use of this echo()? (...)
        This echo() was used to see if the script was wrote properly.*/
    // echo($sql);

    $connection = mySQLconnection();
    
    /* What does this if do? (...)
        If the mysqli_query() works properly, the if will return a true to the caller,
        otherwise, it will return false */
    if (mysqli_query($connection, $sql))
        return true;
    else 
        return false;
    }
?>