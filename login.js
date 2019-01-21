
function login() {
	$("#login").submit();	
}

$(function() {
	if(window.sessao.length == 0) {
		$("#bem_vindo").hide();
		$("#perfil").hide();
	} else {
		$("#bem_vindo").html("Bem vindo, " + window.sessao["nome"] + "&nbsp;&nbsp;&nbsp;");
		$("#entrar").hide();
		$("#cadastrar").hide();
	}

	$("#login").submit(function(evt) {
		$.post("login-db.php", $("#login").serialize()).done(function(data) {
			data = data.trim();
			if(data == "Email inexistente" || data == "Senha incorreta" || data == "Usuario nao encontrado") alert(data);
			else {
				if(window.redirect == null) window.location.replace("index.php");
				else window.location.replace(window.redirect);
			}
		});

		return false;
	});

});