<!-- Modal Editar Usuário -->
<div class="modal-header">
    <h1 class="modal-title fs-5" id="staticBackdropLabel">Preencha as Informações</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body text-left">
    <h6>Editar Usuário</h6>
    <form id="form_usuario">
        <input type="hidden" id="id_usuario" name="id_usuario" value="<?= htmlspecialchars($id_usuario) ?>">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" placeholder="Nome" value="<?= htmlspecialchars($nome_usuario) ?>">
            <label for="floatingInput">Nome</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email_usuario" name="email_usuario" placeholder="E-mail" value="<?= htmlspecialchars($email_usuario) ?>">
            <label for="floatingEmail">E-mail</label>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-success edit-user-button">Salvar</button>
</div>
<div class="alert alert-success alert-dismissible display-none margin-15" role="alert">
    <div></div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="alert alert-danger alert-dismissible display-none margin-15" role="alert">
    <div></div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        