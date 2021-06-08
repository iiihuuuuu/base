var meses = [
    {mes: "Janeiro", dias: 31},
    {mes: "Fevereiro", dias: 28},
    {mes: "Março", dias: 31},
    {mes: "Abril", dias: 30},
    {mes: "Maio", dias: 31},
    {mes: "Junho", dias: 30},
    {mes: "Julho", dias: 31},
    {mes: "Agosto", dias: 31},
    {mes: "Setembro", dias: 30},
    {mes: "Outubro", dias: 31},
    {mes: "Novembro", dias: 30},
    {mes: "Dezembro", dias: 31}
]

// Construção dos Meses e Dias

for(var a = 0; a < meses.length; a++){
    for(var b = 1; b <= meses[a].dias; b++){
        $("#"+meses[a].mes).append('<div id='+b+' class="dias">'+b+'</div>');
    }
}

// Mudar mês com as setas

var mes_atual = 0;
$("#anterior").on("click", function(){
    if(mes_atual == 0){
        var mes_anterior = meses.length - 1;
    }
    else{
        var mes_anterior = mes_atual - 1;
    }
    mes_atual = mes_anterior;
    $(".dias-meses > div").css("display", "none");
    $(".dias-meses #"+meses[mes_atual].mes).css("display", "flex");
})

$("#proximo").on("click", function(){
    if(mes_atual == meses.length - 1){
        var mes_seguinte = 0;
    }
    else{
        var mes_seguinte = mes_atual + 1;
    }
    $(".dias-meses > div").css("display", "none");
    mes_atual = mes_seguinte;
    $("#"+meses[mes_atual].mes).css("display", "flex");
})

// Exibir sempre o mês atual e a data atual

var mes_atual = new Date().getMonth();
var dia_atual = new Date().getDate();
$(".dias-meses #"+meses[mes_atual].mes)[0].style.display = "flex";
$(".data_atual").html(dia_atual + " de " + meses[mes_atual].mes)


/* POPUP CADASTRAR CONSULTAS */

$(".adicionar_evento").on("click", function(){
    $("#containerModal").css("display", "flex");
    modal();
})

$("#fechar").on("click", function(){
    $("#containerModal").css("display", "none");
})

// Inserir consultas no calendário

function modal(){
    var inputs_validar = $(".validar-modal");
    var input_pai = $(".modal .inputs-aviso");
    $("#inserir").on("click", function(){
        aviso(inputs_validar, input_pai);
    });
}

// Valida inputs vazios

function aviso(inputs, pai){
    for(var i = 0; i < inputs.length; i++){
        if (inputs[i].value == ""){
            valid = false;
            inputs[i].focus();
            pai[i].insertAdjacentHTML('afterbegin', '<div id="aviso" class="aviso-input"><i class="fas fa-exclamation-circle"></i><h3>Preencha este campo corretamente!</h3></div>');
            document.getElementById("aviso").style.display = "flex";
            return false;
            break;
        }
        else{
            return true;
        }
    }
}

$("#lancar").on("click", async function(){
    var data = new Date($("#data").val());
    data.setDate(data.getDate() + 1);
    mes_selecionado = data.getMonth();
    dia_selecionado = data.getDate();
    $("#"+meses[mes_selecionado].mes+" #"+dia_selecionado).html(data);
})

// Converter data

function converter_data(data){
    data_convertida = new Date(data);
    return data_convertida.toLocaleString().split(' ')[0];
}
