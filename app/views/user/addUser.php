<!-- Modal Adicionar Usuário -->
<div class="modal-header">
    <h1 class="modal-title fs-5" id="staticBackdropLabel">Preencha as Informações</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body text-left">
    <h6>Adicionar Usuário</h6>
    <form id="form_usuario">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="add_nome_usuario" name="add_nome_usuario" placeholder="Nome" required>
            <label for="floatingInput">Nome</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="add_email_usuario" name="add_email_usuario" placeholder="E-mail" required>
            <label for="floatingEmail">E-mail</label>
        </div>
        <h6>Víncular Cores</h6>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="add_cores_usuario[]" value="1">
            <label class="form-check-label" for="inlineCheckbox1">Azul</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="add_cores_usuario[]" value="2">
            <label class="form-check-label" for="inlineCheckbox2">Vermelho</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="add_cores_usuario[]" value="3">
            <label class="form-check-label" for="inlineCheckbox3">Amarelo</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="add_cores_usuario[]" value="4">
            <label class="form-check-label" for="inlineCheckbox4">Verde</label>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-success create-user-button">Salvar</button>
</div>
<div class="alert alert-success alert-dismissible display-none margin-15" role="alert">
    <div></div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="alert alert-danger alert-dismissible display-none margin-15" role="alert">
    <div></div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
   