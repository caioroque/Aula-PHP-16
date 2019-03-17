<?php if(isset($_SESSION['usuario']) && isset($_SESSION['senha'])){
	$link = '<li role="presentation"><a href="cadastrar.php">Cadastrar Produtos</a></li>
			<li role="presentation"><a href="gerenciar.php">Gerenciar Produtos</a></li>
			<li role="presentation"><a href="logout.php">Logout (Logado como '. $_SESSION['usuario'].')</a></li>';
}else{
	$link = '<li role="presentation"><a href="login.php">Login</a></li>';
}
?>
<ul class="nav nav-pills">
	<li role="presentation"><a href="index.php">Home</a></li>
	<li role="presentation"><a href="exibir.php">Exibir Produtos</a></li>	
	<?php echo $link; ?>
</ul>