<?php
    session_start();

    require_once('functions/config.php');
    require_once(src.'/controller/list_date_client.php');

    $clientRegistered = array(
        'nome' => null,
        'rg' => null,
        'cpf' => null,
        'telefone' => null,
        'celular' => null,
        'email' => null,
        'obs' => null,
        'id' => (int) null
    );
    // This variable will be used to define the manipulation method with the datebase. (Salvar = insert ; Atualizar = update) 
    $buttonMode = 'Salvar';

    if(isset($_SESSION['client'])) {
        $clientRegistered = $_SESSION['client'];
        $buttonMode = 'Atualizar';
    }
    unset($_SESSION['client']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            // Modal Background to none.
            $('#modal-background').css('display' , 'none')
            // Open Modal:
            $('.pesquisar').click(function() {$('#modal-background').fadeIn(400)} )
            // Close Modal:
            $('#modal-exit').click(function() {
                $('#modal-background').fadeOut(400)
            })
        })
    </script>
    <title>Cadastro</title>
</head>
    <body>
        <div id="modal-background">
            <span id="modal-exit">Fechar</span>
            <div id="modal-conteiner">
            </div>
        </div>
        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Contatos </h1>
            </div>
            <div id="cadastroInformacoes">
                <!-- The variables $buttonMode and $clientRegistered are being sent via GET to the input_date_client.php to select if will insert or update the date. -->
                <form action="controller/Input_date_client.php?buttonMode=<?=$buttonMode?>&id=<?=$clientRegistered['idcliente']?>" name="frmCadastro" method="post" >
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=$clientRegistered['nome']?>" maxlength="100" placeholder="Digite seu Nome">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> RG: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtRg" value="<?=$clientRegistered['rg']?>" maxlength="15" placeholder="Digite seu RG">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> CPF: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtCpf" value="<?=$clientRegistered['cpf']?>" maxlength="20" placeholder="Digite seu CPF">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Telefone: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtTelefone" value="<?=$clientRegistered['telefone']?>" placeholder="Digite seu telefone">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Celular: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtCelular" value="<?=$clientRegistered['celular']?>" placeholder="Digite seu celular">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="email" name="txtEmail" value="<?=$clientRegistered['email']?>" placeholder="Digite seu e-mail">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Observações: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <textarea name="txtObs" cols="50" value="" rows="7" placeholder="Observações..."><?=$clientRegistered['obs']?></textarea>
                        </div>
                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="<?=$buttonMode?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="5">
                        <h1> Consulta de Dados</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Celular </td>
                    <td class="tblColunas destaque"> Email </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                <?php
                    $clientDate = showClients();
                    while ($rsClients = mysqli_fetch_assoc($clientDate)) {
                ?>
                        <tr id="tblLinhas">
                            <td class="tblColunas registros"><?=$rsClients['nome']?></td>
                            <td class="tblColunas registros"><?=$rsClients['celular']?></td>
                            <td class="tblColunas registros"><?=$rsClients['email']?></td>
                            <td class="tblColunas registros">
                                <a href="controller/edit_date_client.php?id=<?=$rsClients['idcliente']?>">
                                    <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                                </a>
                                <a onclick="return confirm('Tem certeza que deseja excluir o registro?')" href="controller/delete_date_client.php?id=<?=$rsClients['idcliente']?>">
                                    <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                                </a>
                                <!-- <a href=""> -->
                                    <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                                <!-- </a> -->
                            </td>
                        </tr>
                <?php 
                    } 
                ?>
            </table>
        </div>
    </body>
</html>