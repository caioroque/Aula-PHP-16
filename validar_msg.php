<?php 

if(isset($_GET['msg'])){

	$msg = $_GET['msg'];

	if($msg == 'deletarSuccess'){
		echo '<h3 class="alert alert-success">Produto excluído com sucesso!</h3>';

	}else if($msg == 'deletarError'){
		echo '<h3 class="alert alert-danger">Erro ao excluir produto</h3>';

	}else if($msg == 'editarSuccess'){
		echo '<h3 class="alert alert-success">Produto editado com sucesso!</h3>';

	}else if($msg == 'editarError'){
		echo '<h3 class="alert alert-danger">Erro ao editar produto</h3>';

	}else if($msg == 'empty'){
		echo '<h3 class="alert alert-warning">Atenção: preencha todos os campos do form de edição</h3>';

	}else if($msg == 'error'){
		echo '<h3 class="alert alert-danger">Atenção: não é possível realizar esta ação no momento. Por favor, contate o suporte (vulgo, "pssor")</h3>';
	}

}

?>