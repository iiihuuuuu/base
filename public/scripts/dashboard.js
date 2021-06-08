// Mostrar telas ao clicar nos ícones do menu lateral

var icones = document.getElementsByClassName("icone-lateral");
var telas = document.getElementsByClassName("tela");
for (var a = 0; a < icones.length; a++){

	icones[a].onclick = function(){

		for (var b = 0; b < telas.length; b++){
			telas[b].style.display = "none";
		}

		var tela_mostra = this.id.split('-', 1);
		document.getElementById(tela_mostra).style.display = "flex";
		document.getElementById("titulo-pagina").innerHTML = tela_mostra;
	}
}




