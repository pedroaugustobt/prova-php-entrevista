<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meu Projeto - Teste de conhecimentos PHP + Banco de Dados</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
  <div class="px-4 pt-5 my-5 text-center">
    <h1 class="fw-bold text-body-emphasis">Lista de Usuários</h1>
    <div class="col-lg-6 mx-auto">
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <a href="javascript:void(0);" class="btn btn-success btn-lg px-4 me-sm-3 add-user-button" data-bs-toggle="modal" data-bs-target="#modal-add">Cadastrar Usuário</a>
      </div>
    </div>
    <div class="container px-5">
      <table class="table table-striped table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Cores Vínculadas</th>
            <th scope="col">Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user): 
            $cores_html = '';
            if (!empty($user['color_names'])) {
              foreach ($user['color_names'] as $color_name) {
                $cores_html .= '<span class="btn color-ball" style="background-color: ' . $color_name . ';"></span>';
              }
            } else {
              $cores_html = 'Não Vínculado';
            } 
          ?>
          <tr>
            <th class="align-mid"><?= htmlspecialchars($user['id']) ?></th>
            <td class="align-mid"><?= htmlspecialchars($user['name']) ?></td>
            <td class="align-mid"><?= htmlspecialchars($user['email']) ?></td>
            <td class="align-mid"><?= $cores_html ?></td>
            <td class="align-mid">
              <a href="javascript:void(0);" class="btn btn-primary color-button" data-bs-toggle="modal" data-bs-target="#modal-add">Gerenciar Cores</a>
              <a href="javascript:void(0);" class="btn btn-warning edit-button" data-bs-toggle="modal" data-bs-target="#modal-add">Editar</a>
              <a href="javascript:void(0);" class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#modal-add">Excluir</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content"></div>
      </div>
    </div>
    <!-- Footer -->
    <footer>
      <div class="container text-center">
        <p>Desenvolvido por Pedro Augusto</p>
      </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>