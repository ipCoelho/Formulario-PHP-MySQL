<?php
    /*----------------------------------------------------------------------------------
        Function: Archive responsable for recieving and manegging client's date
        and also creating the variables of the project.

        Responsable: Israel
        Date: 15.09.21
    ------------------------------------------------------------------------------------*/

    require_once('../functions/config.php');
    require_once(src.'db/insert_client.php');
    require_once(src.'db/update_client.php');

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
        // id.
        $id = (int) 0;

        /*-------------------------------------------------------------------------------
            Continuing...
            16.09.21
        ---------------------------------------------------------------------------------*/

        // Testing if the obligated inputs are empty. If empty, an alert (javascript) is shown.
        if ($name == null || $rg == null || $cpf == null) {
            // window.history.back() -> Javascript method that retroceeds once the navigator.
            echo("<script>alert('" . ERROR_EMPTY_BOX. "'); window.history.back(); </script>");
            
        // Testing if the inputs have more characters than the DB allows.
        } elseif (strlen($name) > 100 || strlen($rg) > 15 || strlen($cpf) > 20) {
            echo("<script>alert('" . ERROR_MAX_LENGTH . "'); window.history.back(); </script>");
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

            // Validation to verify if the URL is sending a variable called 'id'.
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            } else {
                $id = 0;
            }

            // Validate if it'd insert or update on the datebase.
            if (strtoupper($_GET['buttonMode']) == 'SALVAR') {
                // Inserting the array to the function that sends the script to the mySQL datebase.
                // This function is getting imported from the " require_once('../db/insert_client.php'); ".
                if (insertInMySQL($clientDate)) {
                    echo("<script> alert('" . MSG_QUERY_TRUE . "'); window.location.href='../index.php'; </script>");
                } else {
                    echo("<script> alert('" . ERROR_QUERY_FALSE . "'); window.history.back(); </script>");
                }
            } elseif (strtoupper($_GET['buttonMode']) == 'ATUALIZAR') {
                $clientDate = array(
                    'nome' => $name,
                    'rg' => $rg,
                    'cpf' => $cpf,
                    'telefone' => $tel,
                    'celular' => $cel,
                    'email' => $email,
                    'obs' => $obs,
                    'id' => $id
                );
                if (updateInMySQL($clientDate)) {
                    echo("<script> alert('" . MSG_UPDATE_TRUE . "'); window.location.href='../index.php'; </script>");
                } else {
                    echo("<script> alert('" . MSG_UPDATE_FALSE . "'); window.history.back(); </script>");
                }
            } else {
                echo("
                    <script>
                        alert('ERRO AO PEGAR VALOR DO BOTÃO'); window.history.back(); 
                    </script>
                ");
            }
        }
    }
?>