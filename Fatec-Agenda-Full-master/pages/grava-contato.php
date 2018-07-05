
<?php
    include_once("header.php");

// Recebe os dados do formulário
$nome = $_POST["nome"];
$ende =$_POST["ende"];
$numero_end =$_POST["numero_end"];
$complemento =$_POST["complemento"];
$bairro =$_POST["bairro"];
$cidade =$_POST["cidade"];
$cep =$_POST["cep"];


// Verifica se os dados estão corretos
//os campos estao com required entao sao campos obrigatorios 

if (!empty($erros)) {
    echo "
        <html>
            <head>
                <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/Fatec-Agenda-Full-master/pages/cad-cidade.php\">
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
    $sql = "insert into tbl_contatos (nome, endereco,nro_endereco,complemento,bairro,cidade_id,cep) values(\"$nome\", \"$ende\",\"$numero_end\", \"$complemento\", \"$bairro\", \"$cidade\",\"$cep\")";
    // Envia o insert para o banco de dados
    $result = mysqli_query($con, $sql);

    // Fecha a conexão bom o banco de dados
    mysqli_close($con);

    echo "
    <html>
        <head>
            <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/Fatec-Agenda-Full-master/pages/cad-contatos.php\">
        </head>
    </html>";
}
?>
