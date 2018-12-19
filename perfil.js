$(function() {
	if(window.sessao == null) {
		$("#bem_vindo").hide();
		$("#perfil").hide();
	} else {
		$("#bem_vindo").html("Bem vindo, " + window.sessao["nome"] + "&nbsp;&nbsp;&nbsp;");
		$("#entrar").hide();
		$("#cadastrar").hide();
	}

	// Muda a cor dos elementos pra cor tema da pagina 
	$(".collection-item").css("color", "#00bcd4");
	$(".active").css("color", "white");
	$(".active").css("background-color", "#00bcd4");

	$("#nome").html(window.sessao["nome"]);

	//Preenche a tabela de dados
	$("#email").html(window.sessao["email"]);
	$("#data_nasc").html(window.sessao["data_nasc"]);
	$("#cep").html(window.sessao["cep"]);
	$("#rua").html(window.sessao["nome_rua"]);
	$("#numero").html(window.sessao["numero"]);
	$("#bairro").html(window.sessao["bairro"]);
	$("#complemento").html(window.sessao["complemento"]);
	$("#cidade").html(window.sessao["cidade"]);
	$("#estado").html(window.sessao["estado"]);

	$("#mudar_senha_btn").click(function(event) {
		$("#mudar_senha").submit();
	});
	$("#mudar_senha").submit(function(event) {
		console.log("Aqui");	
		$.post("mudar_senha-db.php", $("#mudar_senha").serialize()).done(function(data) {
			alert(data);
		});

		return false;
	});
});