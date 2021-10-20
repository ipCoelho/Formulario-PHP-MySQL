<?php
/*-----------------------------------------------------------------------------------------------
    Objective: Will recieve the client's ID, and will execute the function that will search
    the client's date.
    Responsible: Israel
    Date: 06.10.21
    ---------------------------------------------------------------------------------------------*/
    require_once('../functions/config.php');
    require_once(src.'/db/select_client.php');

    // The Client's ID is being recieved by the URL index.
    $idClient = $_GET['id'];

    $clientDate =  searchFromTheDatebase($idClient);

    if($rsClient = mysqli_fetch_assoc($clientDate)) {
        // Active the global variables. (global variables == session variables)
        session_start();
        // session variable sintax = $_SESSION['name'] = x;
        $_SESSION['client'] = $rsClient; 
        // 
        header('location:../index.php');
    } 
    else {
        echo("
        <script>
            alert('ERROR')
            window.history.back();
        </script>");
    }
    
    ?>