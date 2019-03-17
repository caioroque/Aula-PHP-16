<?php include 'lock.php';

if( empty($_POST['nome']) || empty($_POST['marca']) || 
	empty($_POST['valor'])|| empty($_POST['qtde']) ){

	header('location:cadastrar.php?msg=empty');

}else{

	include 'conn.php';

	$nome	= $_POST['nome'];
	$marca	= $_POST['marca'];
	$valor	= $_POST['valor'];
	$qtde	= $_POST['qtde'];

	$id_usuario = $_SESSION['id_usuario'];

	$sql = "INSERT INTO produtos (nome, marca, valor, qtde, id_usuario) 
			VALUES  ('$nome', '$marca', $valor, $qtde, $id_usuario)";

	mysqli_query($conn, $sql);

	$linhas = mysqli_affected_rows($conn);

	if($linhas > 0){

		header('location:cadastrar.php?msg=success');

	}else{

		header('location:cadastrar.php?msg=error');
	}

}

?>