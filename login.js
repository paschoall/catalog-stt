
function login() {
	$("#login").submit();	
}

$(function() {

	$("#login").submit(function(evt) {
		console.log("Here");
		$.post("login.php", $("#login").serialize()).done(function(data) {
			if(data == 'Nenhuma linha') alert("Email ou senha incorretos");
			else alert("Ola " + data);
		});

		return false;
	});

});