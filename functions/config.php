<?php
    /* ----------------------------------------------------------------------------
        Function: Archive for setting the const's system's settings.
        Responsable: Israel
        Date: 15.09.2021
    -------------------------------------------------------------------------------*/
    // Const's to storage the path to the root '/' 
    define('src', $_SERVER['DOCUMENT_ROOT'].'/ds2t20212/backend/Aulas/Project/');
    
    // Const's to the connection with the mySQL's date. ---------------------------
    const DB_SERVER = 'localhost';
    const DB_USER = 'root';
    const DB_PASSWORD = 'bcd127';
    const DB_DATABASE = 'db_contatos_israel_ds2t';
    // ----------------------------------------------------------------------------

    // System's Error Messages
    const ERROR_DB_CONNECTION = "Não foi possível realizar a conexão com o Banco de Dados, entre em contato com o Adminstrador do Sistema.";
    const ERROR_EMPTY_BOX = "Os campos obrigatórios devem ser preenchidos.";
    const ERROR_MAX_LENGTH = "Ensira uma quantidade de caracteres válida.";
    const ERROR_QUERY_FALSE = "Dados não registrados no Banco de Dados!";
    // ----------------------------------------------------------------------------

    // Messages to the User
    const MSG_QUERY_TRUE = "Dados registrados no Banco de Dados com sucesso!";
    // ----------------------------------------------------------------------------
    
?>