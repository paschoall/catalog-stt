/* Valida senha: pelo menos 6 caracteres, com pelo menos 1 digito, 1 letra minuscula e 1 maiuscula */
function validarSenha(senha) {
	return senha.length >= 6 && senha.match(/[0-9]/g) && senha.match(/[a-z]/g) && senha.match(/[A-Z]/g);
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

// Classe de alerta

var editBox;
function EditBox(title, content, cancelEvent, confirmEvent) {
	this.title = title;
	this.content = content;
	this.element = $(document.createElement('div'));
	this.element.html("<div class='card' style='background-color: white; position: fixed; top: 30%; left: 40%; z-index: 10; width: 500px; height: 230px; overflow: hidden;' id = 'editBoxTemplate'> <div class='container' style='overflow: hidden'><div class='section center' style='height: 50px;'> <h6 id='editbox-title'> EDITAR DATA DE NASCIMENTO </h6> </div> <div class='divider'></div> <div id='editbox-content' class='valign-wrapper' style='width: 100%; height: 130px;'> </div> </div> <div class='row valign-wrapper' style='position: absolute; bottom: 0px; width: 100%; margin: 0px; padding: 0px; height: 50px; overflow: hidden;'> <div class='col s6' style='height: 50px; padding:0px;'> <div class='collection' style='height: 50px;'> <a class='collection-item clickable' id='editbox-cancelar' style='color:black;'> <center> Cancelar </center></a> </div> </div> <div class='col s6' style='height: 50px; padding:0px;'> <div class='collection' style='height: 50px;'> <a class='collection-item clickable' id='editbox-confirmar' style='color:black;'> <center> Confirmar </center></a> </div> </div> </div> </div>");
	this.element.attr("id", "editBox");

	var windowWidth = window.innerWidth;
		
	this.width = windowWidth/2;
	this.element.css("width", this.width + "px");
	this.element.css("left", windowWidth/2 - this.width/2 + "px");

	console.log(this.element);



	this.cancelEvent = function() {
		
		if(cancelEvent())
			editBox.remove();
	}
	this.confirmEvent = function() {
		if(confirmEvent()) {
			alert("Entrou aqui mesmo assim");
			editBox.remove();
		}
	}
}

EditBox.prototype.remove = function() {
	alert("Removendo");
	$("#editBox").remove();
	removeBlurDiv();
}

EditBox.prototype.add = function() {
	addBlurDiv();
	$("body").append(this.element);
	$("#editbox-title").html(this.title);
	$("#editbox-content").append(this.content);
	$("#editbox-cancelar").click(this.cancelEvent);
	$("#editbox-confirmar").click(this.confirmEvent);
	
}



function addBlurDiv() {
	var blurdiv = $(document.createElement('div'));
	blurdiv.css({
		'opacity': '.8',
		'position': 'fixed',
		'width': '100%',
		'top': '0px',
		'left': '0px',
		'background-color' : '#FFFFFF',
		'height' : '100vh',
		'z-index' : '10'
	});
	blurdiv.attr("id", "blurdiv");
	$("body").append(blurdiv);
}

function removeBlurDiv() {
	$("#blurdiv").remove();
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

	$("#edit_data_nasc").click(function() {

		
	});

	$("#edit_cep").click(function() {
		var content = $(document.createElement('div'));
		content.html("<div style='width:100%;'> <center> <input type='text' id='editbox-cep'> </center> <label for='editbox-cep'> Novo CEP </label> </div>");
		
		editBox = new EditBox("EDITAR CEP", content, function() {
			// Funcao de cancelar
			return true;
		}, function() {
			// Funcao de confirmar
			alert("Confirmando");
			var validacep = /^[0-9]{8}$/;
			var cep = $('#editbox-cep').val();
			var cep_confirmation = null;
			console.log(cep_confirmation);
			if(validacep.test(cep)) {
				$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

	                if (!("erro" in dados)) {
	                    //Atualiza os campos com os valores da consulta.
	                    $("#rua").val(dados.logradouro);
	                    $("#bairro").val(dados.bairro);
	                    $("#cidade").val(dados.localidade);
	                    $("#estado").val(dados.uf);
	                    cep_confirmation = true;
	                } //end if.
	                else {
	                    //CEP pesquisado não foi encontrado.
	                    alert("CEP não encontrado.");
	                    $("#cep").addClass("invalid");
	                    $("#cep").removeClass("valid");
	                	cep_confirmation = false;
	                }
	            });
			} else {
				alert("Formato inválido");	
				return false;
			}
			console.log(cep_confirmation);
			while(cep_confirmation == null){}
			if(cep_confirmation == false) {
				alert("O CEP não foi encontrado");
				return false;
			} else {
				$('#cep').val(cep);
				return true;
			}
		});

		editBox.add();
		setInputFilter(document.getElementById("editbox-cep"), onlyDigits);

	});
	$("#edit_numero").click(function() {
		
	});
	$("#edit_complemento").click(function() {
		
	});

	

});