
function login() {
	$("#login").submit();	
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

	$("#login").submit(function(evt) {
		console.log("Here");
		$.post("login-db.php", $("#login").serialize()).done(function(data) {
			if(data == 'Nenhuma linha') alert("Email ou senha incorretos");
			else {
				console.log(data);
				alert("Ola " + data);
			}
		});

		return false;
	});

});