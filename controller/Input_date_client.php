<?php
    /*----------------------------------------------------------------------------------
        Function: Archive responsable for recieving and manegging client's date
        and also creating the variables of the project.

        Responsable: Israel
        Date: 15.09.21
    ------------------------------------------------------------------------------------*/

    require_once('../functions/config.php');
    require_once('../db/insert_client.php');

    // Variables' declaration. ---------------------------------------------------------
    $name = (string) null;
    $rg = (string) null;
    $cpf = (string) null;
    $tel = (string) null;
    $cel = (string) null;
    $email = (string) null;
    $obs = (string) null;
    // ---------------------------------------------------------------------------------

    // Tests if it's or not recieving a request from the form. The test can be 'POST' or 'GET'.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        // Setting the values from the form to the variables, using the POST method.
        $name = $_POST['txtNome'];
        $rg = $_POST['txtRg'];
        $cpf = $_POST['txtCpf'];
        $tel = $_POST['txtTelefone'];
        $cel = $_POST['txtCelular'];
        $email = $_POST['txtEmail'];
        $obs = $_POST['txtObs'];

        /*-------------------------------------------------------------------------------
            Continuing...
            16.09.21
        ---------------------------------------------------------------------------------*/

        // Testing if the oblitated inputs are empty. If empty, an alert (javascript) is shown.
        if ($name == null || $rg == null || $cpf == null) {
            echo("<script>
                    alert('".ERROR_EMPTY_BOX."')
                    window.history.back()
                </script>"
            );
        // Testing if the inputs have more characters than the DB allows.
        } elseif (strlen($name) > 100 || strlen($rg) > 15 || strlen($cpf) > 20) {
            echo("<script>
                    alert('".ERROR_MAX_LENGTH."')
                    window.history.back()
                </script>"
                // window.history.back() -> Javascript method that retroceeds once the navigator.
            );
        } else {
            // Array to storage the client date in a singular date.
            $clientDate = array(
                'nome' => $name,
                'rg' => $rg,
                'cpf' => $cpf,
                'telefone' => $tel,
                'celular' => $cel,
                'email' => $email,
                'obs' => $obs,
            );
            // Inserting the array to the function that sends the script to the mySQL datebase.
            // This function is getting imported from the " require_once('../db/insert_client.php'); ".
            insertInMySQL($clientDate);
        }
    }
?>