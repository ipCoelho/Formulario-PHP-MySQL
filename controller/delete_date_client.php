<?php
/*-----------------------------------------------------------------------------------------------
    Objective: Will recieve the client's ID, and will execute the function that will be deleting
    the client's date.
    Responsible: Israel
    Date: 23.09.21
    ---------------------------------------------------------------------------------------------*/
    require_once('../db/delete_client.php');
    require_once('../functions/config.php');

    // The Client's ID is being recieved by the URL index.
    $idClient = $_GET['id'];

    // Calling the delete() function, and adding the $idClient as the parameter.
    if(delete($idClient)) {
        echo("
        <script>
            alert('".DB_DELETE_TRUE."');
            window.location.href='../index.php';
        </script>");
    } else {
        echo("
        <script>
            alert('".DB_DELETE_FALSE."')
            window.history.back();
        </script>");
    }
    
    ?>