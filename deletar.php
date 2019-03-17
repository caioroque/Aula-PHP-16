<?php include 'lock.php';

if(isset($_GET['id_produto'])){

	$id_produto = $_GET['id_produto'];
	$id_usuario = $_SESSION['id_usuario'];

	include 'conn.php';

	$sql = "DELETE FROM produtos WHERE id_produto = $id_produto AND 
			id_usuario = $id_usuario";

	mysqli_query($conn, $sql);

	$linhas = mysqli_affected_rows($conn);

	if($linhas > 0){

		header('location:gerenciar.php?msg=deletarSuccess');
	}else{
		header('location:gerenciar.php?msg=deletarError');
	}

}else{

	header('location:gerenciar.php?msg=error');
}

?>