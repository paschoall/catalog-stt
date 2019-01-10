<header>
	<nav class="cyan">
		<div class="nav-wrapper container">
			<a href="index.php" class="brand-logo">Catalog-STT</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="pesquisa.html"><i class="material-icons right"> search </i> Consultar</a></li>
				<li><div class="vertical-divider">&nbsp; </div>
				<li id="bem_vindo"> </li>
				<li id="perfil"> <a href="<?php if($_SESSION['admin'] == 1) echo 'admin.php'; else echo 'perfil.php';?>"> <i class="material-icons">person</i> </a> </li>
				<li id='entrar'><a href="login.php" >Entrar</a></li>
				<li id='cadastrar'><a href="cadastro.php">Cadastrar</a></li>
			</ul>
		</div>
	</nav>
</header>