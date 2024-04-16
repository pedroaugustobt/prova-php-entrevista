<!-- Modal Víncular/Desvíncular Cor -->
<div class="modal-header">
    <h1 class="modal-title fs-5" id="staticBackdropLabel">Víncule/Desvíncule Cores</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body text-left">
    <h6>Gerenciar Cores</h6>
    <form id="form_usuario">
        <input type="hidden" id="id_usuario_cor" name="id_usuario_cor" value="<?= $id_usuario ?>">
        <?php $colors = [1 => 'Azul', 2 => 'Vermelho', 3 => 'Amarelo', 4 => 'Verde']; ?>
        <?php foreach ($colors as $value => $label): ?>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="colorNames[]" value="<?= $value ?>" 
                id="inlineCheckbox<?= $value ?>" <?= in_array($value, $colorIds) ? 'checked' : '' ?>>
                <label class="form-check-label" for="inlineCheckbox<?= $value ?>"><?= $label ?></label>
            </div>
        <?php endforeach; ?>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-success add-color-button" id="add-color-button">Salvar</button>
</div>
<div class="alert alert-success alert-dismissible display-none margin-15" role="alert">
    <div></div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="alert alert-danger alert-dismissible display-none margin-15" role="alert">
    <div></div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
