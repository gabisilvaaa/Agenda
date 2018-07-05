<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include_once('header.php'); ?>
</head>

<body class="back-cidades">
	<?php include_once('nav-dashboard.php'); ?>

	<div class="register-box">
		<div class="listing-cidade-box-body">
			<div class="row" style="text-align: center">
				<span class="register-title">
					Listagem do Cadastro de Contatos
				</span>
            </div>
            <hr class="hr-separator">
            <div class="row">
                <table class="table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <td style="width: 50px"><b>#</b></td>
                            <td style="width: 350px"><b> Nomes</b></td>
                            <td style="width: 120px"><b> Endereço</b></td>
                            <td style="width: 120px"><b> Numero</b></td>
                            <td style="width: 120px"><b> Complemento</b></td>
                            <td style="width: 120px"><b> Bairro</b></td>
                            <td style="width: 120px"><b> Cidade</b></td>
                            <td style="width: 120px"><b> Cep</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
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

                            $sql = " SELECT cont.id,cont.nome,cont.endereco,cont.nro_endereco,cont.complemento,cont.bairro,cont.cidade_id,cont.cep, 
                            cit.id,cit.nome_cidade FROM tbl_contatos as cont  INNER JOIN tbl_cidades as cit ON cont.cidade_id = cit.id";
                           
                            $result = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_array($result)) {
                                echo "
                                <tr>
                                    <td>$row[0]</td>
                                    <td>". utf8_encode($row['nome']) ."</td>
                                    <td>".utf8_encode($row['endereco'])."</td>
                                    <td>".utf8_encode($row['nro_endereco'])."</td>
                                    <td>".utf8_encode($row['complemento'])."</td>
                                    <td>".utf8_encode($row['bairro'])."</td>
                                    <td>".utf8_encode($row['nome_cidade'])."</td>
                                    <td>".utf8_encode($row['cep'])."</td>
                                
                                    
                                    <td>
                                        <a href=\"alt-contato.php?id=$row[0]\">
                                            <button class=\"btn btn-primary btn-xs\">
                                                <i class=\"fa fa-pencil-alt\"></i>
                                            </button>
                                        </a>
                                        &nbsp;
                                        <a href=\"exc-contato.php?id=$row[0]\">
                                            <button class=\"btn btn-danger btn-xs\">
                                                <i class=\"fa fa-trash-alt\"></i>
                                            </button>
                                        </a>

                                    </td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
		</div>
	</div>

<?php
	include_once('footer.php');
	include_once('js.php');
?>
</body>
</html>