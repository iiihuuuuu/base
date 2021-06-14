<div class="containerPaciente">
  <div class="tabs">

    <div class="titulo-pagina">
      <h1>Controle de Pacientes</h1>
    </div>

      <div class="conteudo-paciente">
        <div class="container-explicacao">
          <div class="explicacao">
            <label for="ativa-info"><i class="far fa-question-circle"></i></label>
            <input type="checkbox" name="" id="ativa-info">
            <div class="info"><p>
                Nesta tela você pode:<br/>
              - Cadastrar um novo paciente;<br/>
              - Consultar um paciente;<br/>
              - Editar um paciente.</p>
            </div>
          </div>
        </div>
        <form class="formPaciente form1" id="formP">

          <div class="inputsForm">

            <div class="containerInputs">

              <div class="coluna-formulario1">

                <div class="inputs inputs-aviso">
                  <input type="text" name="cpf" id="cpf" class="valida-numero validar" minlength="11" maxlength="11" placeholder=" ">
                  <label for="cpf">CPF</label>
                </div>

                <div class="inputs inputs-aviso">
                  <input type="text" name="rg" id="rg" class="valida-numero validar" minlength="9" maxlength="9" placeholder=" ">
                  <label for="rg">RG</label>
                </div>

                <div class="inputs inputs-aviso">
                  <input type="text" name="emissorRG" id="emissorRG" class="valida-numero validar" minlength="9" maxlength="9" placeholder=" ">
                  <label for="emissorRG">EMISSOR RG</label>
                </div>

                <div class="inputs inputs-aviso">
                <input type="checkbox" name="" class="valida_nome">
                  <input type="text" name="nomePaciente" id="nomePaciente" class="valida-texto validar campo_vazio" maxlength="150" placeholder=" ">
                  <p id="aviso-nome"></p>
                  <label for="nomePaciente">Nome</label>
                </div>

                <div class="inputs">
                  <select name="sexo" id="sexo">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                  </select>
                  <label for="sexo">Sexo</label>
                </div>

                <div class="inputs inputs-aviso">
                   <input type="date" class="nasc validar" name="dtNascimento" id="dtNascimento" placeholder=" ">
                   <label for="idade">Data de Nascimento</label>
                </div>

                 <div class="inputs">
                   <input type="text" class="pacienteConvenio valida-texto" name="pacienteConvenio" id="pacienteConvenio" placeholder=" ">
                   <label for="pacienteConvenio">Convênio</label>
                </div>

                <div class="inputs">
                   <input type="text" class="nCarteirinha valida-numero" name="nCarteirinha" id="nCarteirinha" placeholder=" ">
                   <label for="nCarteirinha">Carteirinha</label>
                </div>

              </div>
              <div class="coluna-formulario2">

                 <div class="inputs inputs-aviso">
                      <input type="text" name="cep" id="cep" class="valida-numero validar" maxlength="9" placeholder=" ">
                      <label for="cep">Cep</label>
                  </div>

                  <div class="inputs inputs-aviso">
                      <input type="text" name="endereco" id="endereco" class="valida-texto validar" placeholder=" ">
                      <label for="endereco">Endereço</label>
                  </div>

                  <div class="inputs inputs-aviso">
                     <input type="text" name="bairro" id="bairro" class="valida-texto validar" placeholder=" ">
                     <label for="bairro">Bairro</label>
                  </div>

                  <div class="inputs inputs-aviso">
                      <input type="text" name="email" id="email" class="valida-numero" placeholder=" ">
                      <label for="celuar">Email</label>
                  </div>

                  <div class="inputs inputs-aviso">
                      <input type="text" name="celular" id="celular" class="valida-numero validar celular" placeholder=" ">
                      <label for="celuar">Celular</label>
                  </div>

                  <div class="inputs inputs-aviso">
                    <input type="text" name="telefone" id="telefone" class="valida-numero validar telefone" placeholder=" ">
                    <label for="telefone">Telefone</label>
                  </div>

                  <div class="inputs inputs-aviso">
                    <input type="text" name="telefoneRecado" id="telefoneRecado" class="valida-numero validar telefone" placeholder=" ">
                     <label for="telefoneRecado">Telefone / Celular Recado</label>
                  </div>

                </div>

            </div>

              <div class="container-botoes">
                <div class="botoes">
                  <button type="button" class="enviar" id="enviar" name="cadastrarPaciente">Enviar</button>
                  <button type="reset" id="reset" >Limpar</button>
                </div>
              </div>

          </div>

        </form>
      </div>

  </div>
</div>
