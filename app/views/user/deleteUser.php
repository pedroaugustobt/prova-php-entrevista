<!-- Modal Deletar Usuário -->
<div class="modal-header">
    <h1 class="modal-title fs-5" id="staticBackdropLabel">Deletar Usuário</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body text-left">
    <h6>Tem certeza que deseja deletar o usuário <strong id="nome_usuario_del"><?= htmlspecialchars($nome_usuario_del) ?></strong>?</h6>
    <form id="form_usuario">
        <input type="hidden" id="id_usuario_del" name="id_usuario_del" value="<?= htmlspecialchars($id_usuario_del) ?>">
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-danger delete-user-button">Deletar</button>
</div>
<div class="alert alert-success alert-dismissible display-none margin-15" role="alert">
    <div></div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="alert alert-danger alert-dismissible display-none margin-15" role="alert">
    <div></div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>