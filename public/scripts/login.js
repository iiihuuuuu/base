$("#enviar").click(function(){
	var inputs = document.getElementsByClassName("validar");
	var div_pai = $(".inputs-aviso");
	var len = inputs.length;
	var valid = true;
	for(var i = 0; i < len; i++){
	    if (inputs[i].value == ""){
		    valid = false; 
		    inputs[i].focus();
		    div_pai[i].insertAdjacentHTML('afterbegin', '<div id="aviso" class="aviso-login-input"><i class="fas fa-exclamation-circle"></i><h3>Preencha este campo corretamente!</h3></div>');
		   	document.getElementById("aviso").style.display = "flex";
		    return false;
		    break;
	    }
	}
});

document.getElementById('enviar').addEventListener('click', function(e){
	const form = $('#form').serializeArray();
	$.ajax({
		url: '../dadosLogin',
		method: "POST",
		data: {form:form},
		dataType: 'text',
		// beforeSend: () => {
		// 	if($('#login').val() != "" && $('#senha').val() != ""){
		// 		Swal.fire("aaa", "sdsd", "success");
		// 		console.log('aaaaa');
		// 	}else{
		// 		console.log('aa');
		// 	}
		// },
		success: (data, xhr, status) => {
			console.log(data, xhr, status)
			location.href = '../dashboard';
		},
		complete: (xhr, status) => {

		}
	});
});