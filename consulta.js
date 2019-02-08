function spinningWheel() {
	// Creates a spinning wheel
}

function showData(data) { // data must be an array
	for(var i = 0; i < data.length; ++i) {
		var rec = data[i];

		var autores = "";
		for(var j = 0; j < rec["AUTORES"].length; ++j) autores += (j == 0? "" : ", ") + rec["AUTORES"][j];

		// Adiciona um list item com os dados
		var item = $("#item_template").clone();
		item.removeAttr("hidden");
		item.find("#titulo").html(rec["TITULO"]);
		item.find("#descricao").html(rec["DESCRICAO"]);
		item.find("#idioma").html("Idioma: " + rec["IDIOMA"]);
		item.find("#autores").html("Autores: " + autores);
		item.find("#link").attr("href", "/info_recurso.php?id=" + rec["ID_RECURSO"]);

		$("#result_box").append(item);
	}
}

function blankQuery() {
	spinningWheel();
	$.get("queries/consultar-db.php", function(data) {
		console.log(data);
		var recursos = JSON.parse(data);
		showData(recursos);
	});
}

$(function() {
	$('select').formSelect();
	if(window.sessao.email === undefined) {
		$("#bem_vindo").hide();
		$("#perfil").hide();
	} else {
		$("#bem_vindo").html("Bem vindo, " + window.sessao["nome"] + "&nbsp;&nbsp;&nbsp;");
		$("#entrar").hide();
		$("#cadastrar").hide();
	}

	blankQuery();
});