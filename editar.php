<?php include 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<title>PHP - Aula 16 - Editar Produtos</title>
</head>
<body class="container-fluid">

<?php include 'menu.php'; 

	if(isset($_GET['id_produto'])){

		$id_produto = $_GET['id_produto'];
		$id_usuario = $_SESSION['id_usuario'];
		
		include 'conn.php';

		$sql = "SELECT id_produto, nome, marca, valor, qtde FROM produtos 
			WHERE id_produto = $id_produto AND id_usuario = $id_usuario";

		$result = mysqli_query($conn, $sql);

		$linhas = mysqli_affected_rows($conn);

		if($linhas > 0){

			$registro = mysqli_fetch_assoc($result);

	?>

	<h3 class="text text-info">Editar Produto</h3>

	<form name="edição" action="editado.php" method="post">
	
	<p>
		<label for="nome">Nome do produto:</label><br>
		<input type="text" name="nome" 
		value="<?php echo $registro['nome']; ?>">
	</p>

	<p>
		<label for="marca">Marca:</label><br>
		<input type="text" name="marca" 
		value="<?php echo $registro['marca']; ?>">
	</p>

	<p>
		<label for="valor">Valor unitário</label><br>
		<input type="number" name="valor" min="0.0" step="0.01" 
		value="<?php echo $registro['valor']; ?>">
	</p>

	<p>
		<label for="qtde">Quantidade:</label><br>
		<input type="number" name="qtde" min="0" 
		value="<?php echo $registro['qtde']; ?>">
	</p>

	<input type="hidden" name="id_produto" 
	value="<?php echo $registro['id_produto']; ?>">

	<button name="editar" type="submit" class="btn btn-warning">Editar</button>
	
	</form>

	<?php
		}else{

			header('location:gerenciar.php?msg=editarError');
		}

	}else{

		header('location:gerenciar.php?msg=error');
	}
?>

</body>
</html>