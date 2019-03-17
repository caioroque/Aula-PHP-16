<?php include 'verify_session.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<title>PHP - Aula 15 - Exibir Produtos</title>
</head>
<body class="container-fluid">

<?php include 'menu.php'; 

	include 'conn.php';

	$sql = "SELECT produtos.id_produto, produtos.nome, produtos.marca, produtos.valor, produtos.qtde, usuarios.usuario 
		FROM produtos
		INNER JOIN usuarios 
		ON produtos.id_usuario = usuarios.id_usuario";

	$result = mysqli_query($conn, $sql);

	$linhas = mysqli_affected_rows($conn);

	if($linhas > 0){

		echo '<h3 class="text text-info">Produtos Cadastrados</h3>';

		echo '<table class="table table-striped table=bordered">';
		echo '<tr>';
		echo '<th>ID #</th>';
		echo '<th>Produto</th>';
		echo '<th>Marca</th>';
		echo '<th>Valor Unitário</th>';
		echo '<th>Qtde em Estoque</th>';
		echo '<th>Cadastrado por</th>';
		echo '</tr>';

		for ($i = 0; $i < $linhas; $i++){

			$linha_atual = mysqli_fetch_assoc($result);
			echo '<tr>';
			foreach ($linha_atual as $indice => $valor) {
				echo '<td>' . $valor . '</td>';
			}// fim foreach
			echo '</tr>';
		}// fim do for
		echo '</table>';

	}// fim o if '$linhas > 0'
	else{

		echo '<h3 class="text text-warning">Não há produtos cadastrados</h3>';
	}

?>

</body>
</html>