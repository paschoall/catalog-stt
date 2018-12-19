
function limpa_formulario_cep() {
    // Limpa valores do formulário de cep.
    $("#rua").val("");
    $("#bairro").val("");
    $("#cidade").val("");
    $("#uf").val("");
}


// Input Filter functions
function onlyDigits(value) {
	return /^\d*$/.test(value);
}
function onlyDigitsAndBars(value) {
	return /^[\d\/]*$/.test(value);
}
function noDigits(value) {
	return /^\D*$/.test(value);
}

/* Retirado de https://stackoverflow.com/questions/469357/html-text-input-allows-only-numeric-input */
// Restricts input for the given textbox to the given inputFilter (a function).
function setInputFilter(textBox, inputFilter) {
	["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
		textBox.addEventListener(event, function() {
			if (inputFilter(this.value)) {
				this.oldValue = this.value;
				this.oldSelectionStart = this.selectionStart;
				this.oldSelectionEnd = this.selectionEnd;
			} else if (this.hasOwnProperty("oldValue")) {
				this.value = this.oldValue;
				this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
			}
		});
	});
}

/* Valida senha: pelo menos 6 caracteres, com pelo menos 1 digito, 1 letra minuscula e 1 maiuscula */
function validarSenha(senha) {
	return senha.length >= 6 && senha.match(/[0-9]/g) && senha.match(/[a-z]/g) && senha.match(/[A-Z]/g);
}

/* Valida Campos */
function validarCampos() {
	// Primeiro checa se todos os campos estao validos
	var campos_obrigatorios = document.getElementsByClassName("obrigatorio");
	for(var i = 0; i < campos_obrigatorios.length; ++i) {
		var x = campos_obrigatorios[i];
	}
	for(var i = 0; i < campos_obrigatorios.length; ++i) {
		if(campos_obrigatorios[i].classList.contains("invalid")) {
			alert("Existe algum campo inválido");
			return false;
		}

		if(campos_obrigatorios[i].value == "") {
			alert("Preencha todos os campos obrigatórios");
			return false;
		}
	}
	// Verificar se email existe

	return true;
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
	// Input filters
	setInputFilter(document.getElementById("cep"), onlyDigits);
	setInputFilter(document.getElementById("numero"), onlyDigits);
	setInputFilter(document.getElementById("data_nascimento"), onlyDigitsAndBars);

	setInputFilter(document.getElementById("nome"), noDigits);
	setInputFilter(document.getElementById("cidade"), noDigits);
	setInputFilter(document.getElementById("rua"), noDigits);
	setInputFilter(document.getElementById("bairro"), noDigits);

	/* Codigo para autopreenchimento de dados do CEP - Retirado de https://viacep.com.br/exemplo/jquery/ */
	// Quando o campo cep perde o foco procura no banco de dados.
	$("#cep").blur(function() {
	    //Nova variável "cep" somente com dígitos.
	    var cep = $(this).val().replace(/\D/g, '');

	    //Verifica se campo cep possui valor informado.
	    if (cep != "") {

	        //Expressão regular para validar o CEP.
	        var validacep = /^[0-9]{8}$/;

	        //Valida o formato do CEP.
	        if(validacep.test(cep)) {

	            //Preenche os campos com "..." enquanto consulta webservice.
	            $("#rua").val("...");
	            $("#bairro").val("...");
	            $("#cidade").val("...");
	            $("#uf").val("...");
	            $("#ibge").val("...");

	            //Consulta o webservice viacep.com.br/
	            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

	                if (!("erro" in dados)) {
	                    //Atualiza os campos com os valores da consulta.
	                    $("#rua").val(dados.logradouro);
	                    $("#bairro").val(dados.bairro);
	                    $("#cidade").val(dados.localidade);
	                    $("#uf").val(dados.uf);
	                    $("#ibge").val(dados.ibge);

	                    $("#cep").addClass("valid");
	                    $("#cep").removeClass("invalid");
	                } //end if.
	                else {
	                    //CEP pesquisado não foi encontrado.
	                    limpa_formulario_cep();
	                    alert("CEP não encontrado.");
	                    $("#cep").addClass("invalid");
	                    $("#cep").removeClass("valid");
	                }
	            });
	        } //end if.
	        else {
	        	$("#cep").addClass("invalid");
	        	$("#cep").removeClass("valid");
	            //cep é inválido.
	            limpa_formulario_cep();
	            aler$("#senha").blur(function(){
		var senha = $("#senha").val();
		console.log("aqui");

		if(!validarSenha(senha)) {
			$("#senha").removeClass("valid");
			$("#senha").addClass("invalid");
		} else {
			$("#senha").removeClass("invalid");
			$("#senha").addClass("valid");
		}
	});t("Formato de CEP inválido.");
	        }
	    } //end if.
	    else {
	    	$("#cep").removeClass("invalid");
	        $("#cep").removeClass("valid");
	        //cep sem valor, limpa formulário.
	        limpa_formulario_cep();
	    }
	});

	/* Valida campo de senha chamando a funcao validarSenha quando este perder o foco */
	$("#senha").blur(function(){
		var senha = $("#senha").val();
		console.log("aqui");

		if(!validarSenha(senha)) {
			$("#senha").removeClass("valid");
			$("#senha").addClass("invalid");
		} else {
			$("#senha").removeClass("invalid");
			$("#senha").addClass("valid");
		}
	});

	/* Valida campo de confirmar senha (checa se as senhas batem) quando este perder o foco */
	$("#confirmar_senha").blur(function(){
		var senha1, senha2;
		senha1 = $("#senha").val();
		senha2 = $("#confirmar_senha").val();

		if(senha1 != senha2) {
			$("#confirmar_senha").removeClass("valid");
			$("#confirmar_senha").addClass("invalid");
		} else {
			$("#confirmar_senha").removeClass("invalid");
			$("#confirmar_senha").addClass("valid");
		}
	});

	/* Valida campo de data de nascimento quando este perder o foco */
	$("#data_nascimento").blur(function(){
		var str = $("#data_nascimento").val();
		if(/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/.test(str)) {
			$("#data_nascimento").removeClass("invalid");
			$("#data_nascimento").addClass("valid");
		} else {
			$("#data_nascimento").removeClass("valid");
			$("#data_nascimento").addClass("invalid");
		}
	});

	/* Cria datepicker */
	$(".datepicker").datepicker({
		i18n: {
			months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
			weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
			weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
			weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
			today: 'Hoje',
			clear: 'Limpar',
			cancel: 'Sair',
			done: 'Confirmar',
			labelMonthNext: 'Próximo mês',
			labelMonthPrev: 'Mês anterior',
			labelMonthSelect: 'Selecione um mês',
			labelYearSelect: 'Selecione um ano',
			selectMonths: true,
			selectYears: 15,
		},
		format: 'dd/mm/yyyy',
		yearRange: [1920, 2018],
	});

	/* Submete o form */
	$("#form").submit(function(event) {
		if(!validarCampos()) return false;
		$.post("cadastro-db.php", $("#form").serialize()).done(function(data) {
			if(data.includes("Duplicate entry")) alert("Este email já existe");
			else alert(data);
		});
		return false;
	});
});