<form name="cadastro" action="cadastrado.php" method="post">
	
	<p>
		<label for="titulo">Título:</label><br>
		<input type="text" name="titulo">
	</p>

	<p>
		<label for="autor">Autor:</label><br>
		<input type="text" name="autor">
	</p>

	<p>
		<label for="ano">Ano:</label><br>
		<input type="number" name="ano" max="2017">
	</p>

	<p>
		<label for="editora">Editora:</label><br>
		<input type="text" name="editora">
	</p>

	<button name="cadastrar" type="submit" class="btn btn-success">Cadastrar</button>
</form>
