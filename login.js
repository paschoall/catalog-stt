
function login() {
	$("#login").submit();	
}

/* Exibe um modal ao invés de um alert */
function modalAlert(mensagem, redirecionamento){
	MaterialDialog.alert(
		mensagem, // Corpo do alerta
		{
			title:'Atenção', // Titulo do modal
			buttons:{ // Botoes de recepção (Alerts utilizam apenas botoes de fechar/cancelar)
				close:{
					text:'Fechar', //Texto do btn
					className:'red', // Classe que define a cor do btn
				}
			},
			onCloseEnd: function() {
				// if(redirecionamento)
					// window.location.replace(""); 
			}
		}
	);
}

$(function() {
	if(window.sessao.email === undefined) {
		$("#bem_vindo").hide();
		$("#perfil").hide();
	} else {
		$("#bem_vindo").html("Bem vindo, " + window.sessao["nome"] + "&nbsp;&nbsp;&nbsp;");
		$("#entrar").hide();
		$("#cadastrar").hide();
	}

	$("#login").submit(function(evt) {
		$.post(window.root + "login-db.php", $("#login").serialize()).done(function(data) {
			data = data.trim();
			if(data == "Email inexistente" || data == "Senha incorreta" || data == "Usuário não encontrado"){
			 	msgAlerta = data;
			 	modalAlert(msgAlerta, false);
			}else {
				if(window.redirect == null) window.location.replace(window.root + "recursos/gerenciar.php"); //index.php //gerenciar.php
				else window.location.replace(window.redirect);
			}
		});

		return false;
	});

});