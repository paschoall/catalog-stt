<script type = "text/javascript"> 
	$(function() {
		// Exporta variaveis de sessao para o javascript
		
		window.sessao = {};
		if(<?php echo (isset($_SESSION['email'])? "true" : "false"); ?>) window.sessao["email"] = "<?php echo isset($_SESSION['email'])? $_SESSION['email'] : 0?>";
		if(<?php echo (isset($_SESSION['nome'])? "true" : "false"); ?>) window.sessao["nome"] = "<?php echo isset($_SESSION['nome'])? $_SESSION['nome'] : 0?>";
		if(<?php echo (isset($_SESSION['data_nasc'])? "true" : "false"); ?>) window.sessao["data_nasc"] = "<?php echo isset($_SESSION['data_nasc'])? $_SESSION['data_nasc'] : 0?>";
		if(<?php echo (isset($_SESSION['cep'])? "true" : "false"); ?>) window.sessao["cep"] = "<?php echo isset($_SESSION['cep'])? $_SESSION['cep'] : 0?>";
		if(<?php echo (isset($_SESSION['nome_rua'])? "true" : "false"); ?>) window.sessao["nome_rua"] = "<?php echo isset($_SESSION['nome_rua'])? $_SESSION['nome_rua'] : 0?>";
		if(<?php echo (isset($_SESSION['bairro'])? "true" : "false"); ?>) window.sessao["bairro"] = "<?php echo isset($_SESSION['bairro'])? $_SESSION['bairro'] : 0?>";
		if(<?php echo (isset($_SESSION['numero'])? "true" : "false"); ?>) window.sessao["numero"] = "<?php echo isset($_SESSION['numero'])? $_SESSION['numero'] : 0?>";
		if(<?php echo (isset($_SESSION['cidade'])? "true" : "false"); ?>) window.sessao["cidade"] = "<?php echo isset($_SESSION['cidade'])? $_SESSION['cidade'] : 0?>";
		if(<?php echo (isset($_SESSION['estado'])? "true" : "false"); ?>) window.sessao["estado"] = "<?php echo isset($_SESSION['estado'])? $_SESSION['estado'] : 0?>";
		if(<?php echo (isset($_SESSION['complemento'])? "true" : "false"); ?>) window.sessao["complemento"] = "<?php echo isset($_SESSION['complemento'])? $_SESSION['complemento'] : 0?>";
		console.log(window.sessao);
	});

</script>