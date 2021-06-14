<div class="containerProfissionais">
  <div class="tabs">

    <div class="titulo-pagina">
      <h1>Controle de Profissionais</h1>
    </div>

      <div class="conteudo-profissionais">
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
        <form class="formProfissionais form2" id="formProfissionais">

          <div class="inputsForm">

            <div class="containerInputs">

              <div class="coluna-formulario1">

                <div class="inputs inputs-aviso">
                  <input type="checkbox" name="" class="valida_nome">
                  <input type="text" name="nome-profissional" id="nome-profissional" class="valida-texto validar campo_vazio" maxlength="150" placeholder=" ">
                  <label for="nome-profissional">Nome Profissional</label>
                  <p id="aviso-nome"></p>
                </div>

                <div class="inputs inputs-aviso">
                  <input type="text" name="cargo-profissional" id="cargo-profissional" class="valida-texto validar" placeholder=" ">
                  <label for="cargo-profissional">Cargo</label>
                </div>

                <div class="inputs inputs-aviso">
                  <input type="text" name="especialidade-profissional" id="especialidade-profissional" class="valida-texto validar" placeholder=" ">
                  <label for="especialidade-profissional">Especialidade</label>
                </div>

                <div class="inputs inputs-aviso">
                  <input type="text" name="endereco-profissional" id="endereco-profissional" class="valida-texto validar campo_vazio" maxlength="150" placeholder=" ">
                  <label for="endereco-profissional">Endereço</label>
                </div>

                <div class="inputs">
                   <input type="text" class="nasc validar" name="email-profissional" id="email-profissional" placeholder=" ">
                   <label for="email-profissional">E-mail</label>
                </div>

                <div class="inputs inputs-aviso">
                   <input type="text" class="nasc validar" name="telefone-profissional" id="telefone-profissional" placeholder=" ">
                   <label for="telefone-profissional">Telefone</label>
                </div>

                 <div class="inputs">
                   <input type="text" class="pacienteConvenio valida-texto" name="celular-profissional" id="celular-profissional" placeholder=" ">
                   <label for="celular-profissional">Celular</label>
                </div>

                <div class="inputs">
                   <input type="text" class="contato-profissional valida-texto" name="contato-profissional" id="contato-profissional" placeholder=" ">
                   <label for="contato-profissional">Contato</label>
                </div>

              </div>
              <div class="coluna-formulario2">

                 <div class="inputs inputs-aviso">
                      <input type="text" name="forma-contratacao" id="forma-contratacao" class="valida-texto validar" maxlength="9" placeholder=" ">
                      <label for="forma-contratacao">Forma da Contratação</label>
                  </div>

                  <div class="inputs inputs-aviso">
                      <input type="text" name="salario" id="salario" class="validar" placeholder=" ">
                      <label for="salario">Salário</label>
                  </div>

                  <div class="inputs inputs-aviso">
                     <input type="text" name="tipo-proventos" id="tipo-proventos" class="valida-texto validar" placeholder=" ">
                     <label for="tipo-proventos">Tipo de Proventos</label>
                  </div>

                </div>

            </div>

              <div class="container-botoes">
                <div class="botoes">
                  <button type="button" class="enviar" id="enviar-profissional" name="cadastrar-profissional">Enviar</button>
                  <button type="reset">Limpar</button>
                </div>
              </div>

          </div>

        </form>
      </div>

  </div>
</div>
