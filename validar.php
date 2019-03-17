<?php 
if(empty($_POST['usuario']) || empty($_POST['senha'])){
	header('location:login.php?msg=errorEmpty');
}else{

	include 'conn.php';

	$usuario = $_POST['usuario'];
	$senha	 = $_POST['senha'];



	$sql = "SELECT id_usuario, usuario, senha FROM usuarios WHERE usuario LIKE '$usuario'";

	$result = mysqli_query($conn, $sql);

	$linhas = mysqli_affected_rows($conn);

	if($linhas > 0){
		
		// transformar resultado num array associativo:
		$registro = mysqli_fetch_assoc($result);

		if(crypt($senha, $registro['senha']) == $registro['senha']){
			session_start();
			$_SESSION['id_usuario'] = $registro['id_usuario'];
			$_SESSION['usuario'] 	= $registro['usuario'];
			$_SESSION['senha']   	= $registro['senha'];
			header('location:cadastrar.php');
			
		}else{
			header('location:login.php?msg=errorInvalid');
		}


	}else{

		header('location:login.php?msg=errorInvalid');

	}

}
?>