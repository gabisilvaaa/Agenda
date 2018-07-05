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
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include_once('header.php'); ?>
</head>

<body class="back-cidades">
	<?php include_once('nav-dashboard.php'); ?>

	<div class="register-box">
		<div class="register-box-body">
			<div class="row" style="text-align: center">
				<span class="register-title">
					Cadastro de Contatos
				</span>
			</div>
			<hr class="hr-separator">
			<div class="row" style="text-align: center">
				<p class="register-subtitle">Forneça os dados abaixo</p>
			</div>

			<!-- Formulário de cadastramento de Contatos -->
			<form action="grava-contato.php" method="post" autocomplete="off">

				<!-- nome da Contatos -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-address-book"></span>
					</span>
					<input required type="text" class="form-control"
						name="nome" required placeholder="Nome"
						aria-describedby="input-nome">
				</div>
				<br>

				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fa fa-map-marker" aria-hidden="true"></span>
					</span>
					<input required type="text" class="form-control"
						name="ende" required placeholder="Endereço"
						aria-describedby="input-Ende">
				</div>
				<br>

                <div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-list-ol"></span>
					</span>
					<input required type="text" class="form-control"
						name="numero_end" required placeholder="Numero do Endereço"
						aria-describedby="input-numero_ende">
				</div>
				<br>

                <div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-home"></span>
					</span>
					<input required type="text" class="form-control"
						name="complemento" required placeholder="Complemento"
						aria-describedby="input-nome_coplemento">
				</div>
				<br>

                <div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-map-signs"></span>
					</span>
					<input required type="text" class="form-control"
						name="bairro" required placeholder="Bairro"
						aria-describedby="input-bairro">
				</div>
				<br>

                <div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-globe"></span>
					</span>

                    <select required name="cidade" class="form-control">
                    <option value="">Selecione</option>
                    <?php 
                        $query = $con->query("SELECT * FROM tbl_cidades");
                        while($row = $query->fetch_array()) {

                        echo '<option value='.$row['id'].'>'.$row['nome_cidade'].'</option>';
  
                   }; ?>  
                    </select>
				</div>
				<br>

                <div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-map"></span>
					</span>
					<input required type="text" class="form-control"
						name="cep" required placeholder="Cep"
						aria-describedby="input-cep">
				</div>
				<br>

				<!-- Botão de envio -->
				<div class="row" style="margin-bottom:10px">
					<div class="col-xs-12">
						<button type="submit"
							class="btn btn-primary btn-block btn-flat">
							Inserir <span class="fas fa-chevron-circle-right"></span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
	include_once('footer.php');
	include_once('js.php');
?>
</body>
</html>