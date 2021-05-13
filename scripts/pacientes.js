$(document).ready(() => {

	// Validação campo nome

	$("#valida_nome").css("display", "none");
	    $('.campo_vazio').on("change keyup paste", function(){
			var nome = $('.campo_vazio').val().split('');
			for (var a = 0; a < nome.length; a++){
				if (nome.length < 3){
					$("#valida_nome").prop('checked', true);
					$("#aviso-nome").text("Por favor, digite um nome válido.");
					$("#aviso-nome").css("color", "#ff0000");
					break;
				}
				else{
					$("#aviso-nome").text("");
					$("#valida_nome").prop('checked', false);
				}
			}
			if(nome.length > 0){
				$(this).css("background-color", "transparent");
			}
	    })

	// Remove os avisos ao digitar

	$("input").on("keyup change", function(){
		$("#aviso").remove();
	});

	$("#enviar").click(function(){
		$("#aviso").remove();
		var inputs = document.getElementsByClassName("validar");
		var div_pai = $(".inputs-aviso");
		var len = inputs.length;
		var valid = true;
		for(var i = 0; i < len; i++){
		    if (inputs[i].value == ""){
			    valid = false; 
			    inputs[i].focus();
			    div_pai[i].insertAdjacentHTML('afterbegin', '<div id="aviso" class="aviso-input"><i class="fas fa-exclamation-circle"></i><h3>Preencha este campo corretamente!</h3></div>');
			   	document.getElementById("aviso").style.display = "flex";
			    return false;
			    break;
		    }
		    //Caso nao possuir campos vazios  #Vinicius
		}
		if(valid){
			let formP = $('#formP').serializeArray();
			$.ajax({
				url: 'app/controllers/paciente-controller.php?key=paciente',
				method: "POST",
				data: {formP:formP},
				dataType: 'text',
				async: true,
				beforeSend: function(xhr){
					Swal.fire({
						title: "Aguarde!",
						text: "Enviado dados...",
						showConfirmButton: false,
						allowEscapeKey: false,
						allowOutsideClick: false		
					});
				},
				success: function(result, status, xhr){
					console.log(result, status, xhr)
					if(status === "success" && xhr.status === 200){
						setTimeout(()=>{
							Swal.fire({
								title: "Paciente Cadastrado!",
								text: "Clique em OK para sair.",
								icon: "success",
								allowEscapeKey: false,
								allowOutsideClick: false
							}).then((res)=>{
								if(res.isConfirmed == true){
									$('#reset').click();
									console.log(result);
								}
							});
						}, 2000);
					}else{
						Swal.fire({
							title: "Erro ao cadastrar o paciente",
							text: "Tente novamente ou comunique o setor de SUPORTE!",
							icon: "error",
							showConfirmButton: true,
							allowOutsideClick: false,
							allowEscapeKey: false
						});
					}
				},
				error: function(xhr, status, error){
					console.log(error, status, xhr);
				}
			});
		}
	});

	 // Máscara no nome
	$('.valida-texto').on('input', function(e){
		e.target.value = e.target.value.replace(/[0-9!@#$%&*()+=]|\-/, '');
	});

	// Máscara de telefone
	$('.valida-numero').on('input', function(e){
		e.target.value = e.target.value.replace(/\D/g, '');
	});

	//TELEFONES
	$('.telefone').on('input', function(e){
		let tel = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,4})(\d{0,4})/);
		e.target.value = !tel[2] ? tel[1] : '(' + tel[1] + ') ' + tel[2] + (tel[3] ? '-' + tel[3] : '');
	});
	$('#celular').on('input', function(e){
		let cel = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
		e.target.value = !cel[2] ? cel[1] : '(' + cel[1] + ') ' + cel[2] + (cel[3] ? '-' + cel[3] : ''); 
	});
});