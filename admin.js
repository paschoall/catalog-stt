

$(function() {
	if(window.sessao == null) {
		$("#bem_vindo").hide();
		$("#perfil").hide();
	} else {
		$("#bem_vindo").html("Bem vindo, " + window.sessao["nome"] + "&nbsp;&nbsp;&nbsp;");
		$("#entrar").hide();
		$("#cadastrar").hide();
	}
	
	// Adiciona as requisicoes de window.requisicoes para o html
	var div_lista_requisicoes = $("#lista_requisicoes");

	for(var i = 0; i < window.requisicoes.length; ++i) {
		var li = $("<li class='collection-item' id='" + window.requisicoes[i]['ID_RECURSO'] + "'></li>");

		var titulo = $("<p style='font-size: 15pt;'> </p>");
		titulo.append(window.requisicoes[i]['TITULO']);
		titulo.append("<a style='float: right; font-size:11pt;'href=''>Ver recurso</a>"); // falta adicionar o link para ver o recurso
		li.append(titulo);

		var autor = $("<p> Por " + window.requisicoes[i]['NOME'] + ", " + window.requisicoes[i]['EMAIL'] + "</p>");
		li.append(autor);

		var data_ad = $("<p> <i> Adicionado em " + window.requisicoes[i]['DATA_AD'] + "</i> </p>");
		li.append(data_ad);

		var div_botoes = $("<div class='row'> </div>");
		var bot_aceitar = $("<div class = 'col s6'> <center> <a id='aceitar_" + window.requisicoes[i]['ID_RECURSO'] + "' class='waves-effect waves-light btn green'>ACEITAR</a> </center> </div>")
		var bot_recusar = $("<div class = 'col s6'> <center> <a id='recusar_" + window.requisicoes[i]['ID_RECURSO'] + "' class='waves-effect waves-light btn red'>RECUSAR</a> </center> </div>")
		div_botoes.append(bot_aceitar);
		div_botoes.append(bot_recusar);
		li.append(div_botoes);
		div_lista_requisicoes.append(li);
	}

})