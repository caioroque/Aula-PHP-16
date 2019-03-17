<?php include 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<title>PHP - Aula 15 - Gerenciar Produtos</title>
</head>
<body class="container-fluid">

<?php include 'menu.php'; 

	include 'validar_msg.php';

	include 'conn.php';

	$id_usuario = $_SESSION['id_usuario'];

	$sql = "SELECT produtos.id_produto, produtos.nome, produtos.marca, produtos.valor, produtos.qtde, usuarios.usuario 
		FROM produtos
		INNER JOIN usuarios 
		ON produtos.id_usuario = usuarios.id_usuario
		WHERE produtos.id_usuario = $id_usuario";

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
		echo '<th>Editar</th>';
		echo '<th>Deletar</th>';
		echo '</tr>';

		for ($i = 0; $i < $linhas; $i++){

			$linha_atual = mysqli_fetch_assoc($result);
			echo '<tr>';
			foreach ($linha_atual as $indice => $valor) {
				
				if($indice == "id_produto"){
					$id_produto = $valor;
				}

				echo '<td>' . $valor . '</td>';
			}// fim foreach

			echo '<td><a href="editar.php?id_produto='.$id_produto.'" class="btn btn-warning">Editar</a></td>';

			echo '<td><a href="deletar.php?id_produto='.$id_produto.'" class="btn btn-danger" OnClick="return confirm(\'Tem certeza que deseja excluir?\')">Deletar</a></td>';
			echo '</tr>';
		}// fim do for
		echo '</table>';

	}// fim o if '$linhas > 0'
	else{

		echo '<h3 class="text text-warning">Não há produtos cadastrados por '. $_SESSION['usuario'].'</h3>';
	}

?>

</body>
</html>