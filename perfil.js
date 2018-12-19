/* Valida senha: pelo menos 6 caracteres, com pelo menos 1 digito, 1 letra minuscula e 1 maiuscula */
function validarSenha(senha) {
	return senha.length >= 6 && senha.match(/[0-9]/g) && senha.match(/[a-z]/g) && senha.match(/[A-Z]/g);
}

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
	$(".sidebar").css("color", "#00bcd4");
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

	var validacao = function(e){
		var senha = $("#nova").val();
		if(!validarSenha(senha)) {
			console.log("Aqui");
			$("#nova").removeClass("valid");
			$("#nova").addClass("invalid");
		} else {
			$("#nova").removeClass("invalid");
			$("#nova").addClass("valid");
		}
	}
	$("#nova").keyup(validacao);
	$("#nova").blur(validacao);

	$("#mudar_senha").submit(function(event) {
		if(validarSenha($("#nova").val()) == false) { // If redundante para segurança
			alert("Senha inválida");
			return false;
		}
		$("#mudar_senha_btn").attr("disabled", true);
		$.post("mudar_senha-db.php", $("#mudar_senha").serialize()).done(function(data) {
			alert(data);
			$("#mudar_senha_btn").attr("disabled", false);
		});

		return false;
	});
});