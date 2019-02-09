<header>
	<nav class="cyan">
		<div class="nav-wrapper container">
			<a href="<?=ROOT?>index.php" class="brand-logo">Catalog-STT</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="<?=ROOT?>consulta.php"><i class="material-icons right"> search </i> Consultar</a></li>
				<li><div class="vertical-divider">&nbsp; </div>
				<li id="bem_vindo"> </li>
				<li id="perfil"> <a href="<?=ROOT?><?php if($_SESSION['admin'] == 1) echo 'admin.php'; else echo 'perfil.php';?>"> <i class="material-icons">person</i> </a> </li>
				<li id='entrar'><a href="<?=ROOT?>login.php" >Entrar</a></li>
				<li id='cadastrar'><a href="<?=ROOT?>cadastro.php">Cadastrar</a></li>
			</ul>
		</div>
	</nav>
</header>