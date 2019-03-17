<?php include 'lock.php'; 

if(empty($_POST['nome']) || empty($_POST['marca']) ||
	empty($_POST['valor']) || empty($_POST['qtde'])){

	header('location:gerenciar.php?msg=empty');
}else{

	$nome 		= $_POST['nome'];
	$marca		= $_POST['marca'];
	$valor		= $_POST['valor'];
	$qtde		= $_POST['qtde'];
	$id_produto	= $_POST['id_produto'];

	$id_usuario	= $_SESSION['id_usuario'];

	include 'conn.php';

	$sql = "UPDATE produtos SET nome = '$nome', marca = '$marca', 
			valor = $valor, qtde = $qtde 
			WHERE id_produto = $id_produto AND id_usuario = $id_usuario";

	mysqli_query($conn, $sql);

	$linhas = mysqli_affected_rows($conn);

	if ($linhas > 0){

		header('location:gerenciar.php?msg=editarSuccess');
	}else{

		header('location:gerenciar.php?msg=editarError');
	}
}




?>