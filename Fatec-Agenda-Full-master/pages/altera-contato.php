
<?php
    include_once("header.php");

// Recebe os dados do formulário
$id = $_POST["id"];
$nome = $_POST["nome"];
$ende =$_POST["ende"];
$numero_end =$_POST["numero_end"];
$complemento =$_POST["complemento"];
$bairro =$_POST["bairro"];
$cidade =$_POST["cidade"];
$cep =$_POST["cep"];




if (!empty($erros)) {
    echo "
        <html>
            <head>
                <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/Fatec-Agenda-Full-master/pages/lista-contatos.php\">
            </head>
            <body onload='alert($erros);'></body>
        </html>
    ";
} else {
    // Parametriza a conexão com o banco de dados
    $host     = "localhost";
    $user     = "root";
    $password = "";
    $database = "agenda";

    // Faz a conexão com o servidor MySQL
    $con = mysqli_connect($host, $user, $password);

    // Verifica se ocorreu erro de conexão
    if (!$con) {
        // Se sim, então encerra o programa com uma mensagem de erro
        die("Erro de conexão com o servidor do BD");
    }

    // Determina qual banco de dados que será utilizado
    $db = mysqli_select_db($con, $database);

    // Verifica se ocorreu erro na seleção
    if (!$db) {
        // Se sim, então encerra o programa com uma mensagem de erro
        die("Erro ao selecionar o banco de dados.");
    }

    // Cria a sentença SQL para inserir o usuário
    $sql ="UPDATE tbl_contatos SET nome='$nome', endereco='$ende', nro_endereco='$numero_end',
     complemento='$complemento', bairro='$bairro', cidade_id='$cidade', cep='$cep' WHERE id=$id";
   
    // Envia o insert para o banco de dados
    $result = mysqli_query($con, $sql);

    // Fecha a conexão bom o banco de dados
    mysqli_close($con);

    echo "
    <html>
        <head>
            <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/Fatec-Agenda-Full-master/pages/lista-contatos.php\">
        </head>
    </html>";
}
?>
