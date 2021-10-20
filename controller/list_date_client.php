<?php
    /*-------------------------------------------------------------------------------------------
    Objective: This file will be responsible to list (or select) the client date from the datebase
    and show in the page.
    Responsible: Israel
    Date: 23.09.21
    ---------------------------------------------------------------------------------------------*/

    /* Why is this being imported? (...)
        This file is being imported */
    require_once(src.'/db/select_client.php');

    function showClients() {
        $clientDate = selectFromTheDatebase();
        return $clientDate;
    }

?>