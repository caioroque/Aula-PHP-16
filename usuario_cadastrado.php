<?php 
if (empty($_POST['usuario']) || empty($_POST['senha']) 
	|| empty($_POST['email'])){

	header('location:cadastrar_usuario.php?msg=empty');
}else{


	include 'conn.php';

	$usuario = $_POST['usuario'];
	$senha 	 = $_POST['senha'];
	$email 	 = $_POST['email'];

	// criptografar senha:
	$segura = crypt($senha, '');

	$sql = "INSERT INTO usuarios (usuario, senha, email)
	VALUES ('$usuario', '$segura', '$email')";

	mysqli_query($conn, $sql);

	$linhas = mysqli_affected_rows($conn);

	if ($linhas > 0){
		// redireciona para  a página de cadastro de usuario
		header('location:cadastrar_usuario.php?msg=success');
	}else{

		header('location:cadastrar_usuario.php?msg=error');
	}

}

 ?>