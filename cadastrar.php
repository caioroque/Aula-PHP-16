<?php include 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<title>PHP - Aula 15 - Cadastrar Livro</title>
</head>
<body class="container-fluid">

<?php include 'menu.php'; 


	if(isset($_GET['msg'])){

		$msg = $_GET['msg'];
		
		if($msg == 'empty' ){

			echo '<h3 class="alert alert-warning">Atenção: preencha todo o form de cadastro</h3>';
		}else if($msg == 'success'){

			echo '<h3 class="alert alert-success">Produto cadastrado com sucesso!</h3>';
		}else if($msg == 'error'){

			echo '<h3 class="alert alert-danger>Erro ao cadastrar produto</h3>';
		}

	}

?>

<h2 class="text text-info">Cadastrar Produto</h2>

<form name="cadastro" action="cadastrado.php" method="post">
	
	<p>
		<label for="nome">Nome do produto:</label><br>
		<input type="text" name="nome">
	</p>

	<p>
		<label for="marca">Marca:</label><br>
		<input type="text" name="marca">
	</p>

	<p>
		<label for="valor">Valor unitário</label><br>
		<input type="number" name="valor" min="0.0" step="0.01">
	</p>

	<p>
		<label for="qtde">Quantidade:</label><br>
		<input type="number" name="qtde" min="0">
	</p>

	<button name="cadastrar" type="submit" class="btn btn-success">Cadastrar</button>
</form>


</body>
</html>