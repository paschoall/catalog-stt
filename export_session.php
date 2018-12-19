<script type = "text/javascript"> 
	$(function() {
		// Exporta variaveis de sessao para o javascript
		
		window.sessao = [];
		if(<?php echo isset($_SESSION['email'])?>) {
			window.sessao["email"] = "<?php echo $_SESSION['email']?>";
			window.sessao["nome"] = "<?php echo $_SESSION['nome']?>";
			window.sessao["data_nasc"] = "<?php echo $_SESSION['data_nasc']?>";
			window.sessao["cep"] = "<?php echo $_SESSION['cep']?>";
			window.sessao["nome_rua"] = "<?php echo $_SESSION['nome_rua']?>";
			window.sessao["bairro"] = "<?php echo $_SESSION['bairro']?>";
			window.sessao["numero"] = "<?php echo $_SESSION['numero']?>";
			window.sessao["cidade"] = "<?php echo $_SESSION['cidade']?>";					
			window.sessao["estado"] = "<?php echo $_SESSION['estado']?>";
			window.sessao["complemento"] = "<?php echo $_SESSION['complemento']?>";
		}

		console.log(sessao);	
	});

</script>