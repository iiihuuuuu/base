<div class="container-infos">
    <div class="mini-calendario">
    </div>
    <div class="infos">

    </div>
</div>
<div class="calendario">
    <div class="titulo-meses">
        <div class="data_atual"></div>
        <div class="setas">
            <i id="anterior" class="fas fa-chevron-left"></i>
            <i id="proximo" class="fas fa-chevron-right"></i>
        </div>
        <button class="adicionar_evento">Cadastrar Consulta</button>
        <input class="pesquisar_consulta" type="text" name="pesquisar" placeholder="Pesquisar consultas">
    </div>
    <div class="dias-meses">
        <div class="meses" id="Janeiro"></div>
        <div class="meses" id="Fevereiro"></div>
        <div class="meses" id="Março"></div>
        <div class="meses" id="Abril"></div>
        <div class="meses" id="Maio"></div>
        <div class="meses" id="Junho"></div>
        <div class="meses" id="Julho"></div>
        <div class="meses" id="Agosto"></div>
        <div class="meses" id="Setembro"></div>
        <div class="meses" id="Outubro"></div>
        <div class="meses" id="Novembro"></div>
        <div class="meses" id="Dezembro"></div>
    </div>
</div>

<!-- POPUP CADASTRAR CONSULTAS -->

<div class="containerModal" id="containerModal">
    <span id="fechar">X</span>
    <div class="modal">
        <h1>Dados da Consulta</h1>
        <form>
            <div class="inputsForm">
                <div class="inputs inputs-aviso">
                    <label>Paciente</label>
                    <input type="text" class="validar validar-modal" id="paciente" name="paciente" placeholder="" value=""/>
                </div>
                <div class="inputs inputs-aviso">
                    <label>Profissional</label>
                    <input type="text" class="validar validar-modal" id="profissional" name="profissional" placeholder="" value=""/>
                </div>
                <div class="inputs inputs-aviso validar-modal" id="input-data">
                    <label>Data</label>
                    <input type="date" class="datas inputs-aviso validar-modal" id="data">
                </div>
            </div>
        </form>
        <div class="botoes">
                <button id="inserir">Inserir</button>
                <button id="lancar">Lançar</button>
        </div>
        <div class="container-armazenamento" id="container-armazenamento">
            <div class="titulos-armazenamento">
                <span>Profissional</span>
                <span>Paciente</span>
                <span>Horário</span>
                <span>Data</span>
            </div>
            <div id="armazenamento"></div>
        </div>
    </div>
</div>

