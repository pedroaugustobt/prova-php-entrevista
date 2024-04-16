$(document).ready(function() {
    $(".add-user-button").on('click', function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "index.php",
            data: {
                action: "addUserForm"
            },
            success: function(response) {
                $('#modal-add .modal-content').html(response);
            }
        });
    });

    $(".edit-button").on('click', function(event) {
        event.preventDefault();
        var row = $(this).closest("tr");
        var id = row.find("th:eq(0)").text();
        var nome = row.find("td:eq(0)").text();
        var email = row.find("td:eq(1)").text();
        $.ajax({
            type: "POST",
            url: "index.php",
            data: {
                action: "editUserForm", 
                id_usuario: id, 
                nome_usuario: nome, 
                email_usuario: email
            },
            success: function(response) {
                $('#modal-add .modal-content').html(response);
            }
        });
    });

    $(".color-button").on('click', function(event) {
        event.preventDefault();
        var row = $(this).closest("tr");
        var id = row.find("th:eq(0)").text();
        $.ajax({
            type: "POST",
            url: "index.php",
            data: {
                action: "addColorForm", 
                id_usuario: id
            },
            success: function(response) {
                $('#modal-add .modal-content').html(response);
            }
        });
    });

    $(".delete-button").on('click', function(event) {
        event.preventDefault();
        var row = $(this).closest("tr");
        var id = row.find("th:eq(0)").text();
        var nome = row.find("td:eq(0)").text();
        $.ajax({
            type: "POST",
            url: "index.php",
            data: {
                action: "deleteUserForm", 
                id_usuario_del: id, 
                nome_usuario_del: nome
            },
            success: function(response) {
                $('#modal-add .modal-content').html(response);
            }
        });
    });
    
    $(document).on('click', '.create-user-button', function(event) {
        event.preventDefault();
        var btn = $(this);
        var nome = $("#add_nome_usuario").val();
        var email = $("#add_email_usuario").val();
        var cores = [];
        $("input[name='add_cores_usuario[]']:checked").each(function() {
            cores.push($(this).val());
        });
        if (cores.length === 0 || cores.length === null) {
            cores = "";
        }
        btn.html("Salvando...");
        $.ajax({
            type: "POST",
            url: "index.php",
            data: {
                action: "addUser", 
                name: nome, 
                email: email, 
                cores: cores
            },
            success: function (response) {
                if (response.status == 1) {
                    btn.html("Salvar");
                    $(".alert-success").removeClass("display-none");
                    $(".alert-success div").text(response.mensagem);
                    setTimeout(function() {
                        window.location.reload();
                    }, 1500);
                } else {
                    btn.html("Salvar");
                    $(".alert-danger").removeClass("display-none");
                    $(".alert-danger div").text(response.mensagem);
                }
            },
        });
    });

    var selectedColors = [];
    $('input[name="colorNames[]"]').change(function() {
        var colorId = $(this).val();
        if ($(this).is(':checked')) {
            if (!selectedColors.includes(colorId)) {
                selectedColors.push(colorId);
            }
        } else {
            selectedColors = selectedColors.filter(function(item) {
                return item !== colorId;
            });
        }
    });

    $(document).on('click', '.add-color-button', function(event) {
        event.preventDefault();
        var btn = $(this);
        var userId = $("#id_usuario_cor").val();
        var selectedColors = [];
        $('input[name="colorNames[]"]:checked').each(function() {
            selectedColors.push($(this).val());
        });
        if (selectedColors.length === 0 || selectedColors.length === null) {
            selectedColors = "";
        }
        btn.html("Salvando...");
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                action: "updateColors",
                id_usuario: userId,
                cores_selecionadas: selectedColors
            },
            success: function(response) {
                if (response.status == 1) {
                    btn.html("Salvar");
                    $(".alert-success").removeClass("display-none");
                    $(".alert-success div").text(response.mensagem);
                    setTimeout(function() {
                        window.location.reload();
                    }, 1500);
                } else {
                    btn.html("Salvar");
                    $(".alert-danger").removeClass("display-none");
                    $(".alert-danger div").text(response.mensagem);
                }
            }
        });
    });

    $(document).on('click', '.edit-user-button', function(event) {
        event.preventDefault();
        var btn = $(this);
        var id = $("#id_usuario").val();
        var nome = $("#nome_usuario").val();
        var email = $("#email_usuario").val();
        btn.html("Salvando...");
        $.ajax({
            type: "POST",
            url: "index.php",
            data: {
                action: "updateUser", 
                id_usuario: id, 
                nome_usuario: nome, 
                email_usuario: email
            },
            success: function (response) {
                if (response.status == 1) {
                    btn.html("Salvar");
                    $(".alert-success").removeClass("display-none");
                    $(".alert-success div").text(response.mensagem);
                    setTimeout(function() {
                        window.location.reload();
                    }, 1500);
                } else {
                    btn.html("Salvar");
                    $(".alert-danger").removeClass("display-none");
                    $(".alert-danger div").text(response.mensagem);
                }
            },
        });
    });
  
    $(document).on('click', '.delete-user-button', function(event) {
        event.preventDefault();
        var btn = $(this);
        var id = $("#id_usuario_del").val();
        btn.html("Deletando...");
        $.ajax({
            type: "POST",
            url: "index.php",
            data: {action: "deleteUser", id_usuario_del: id},
            success: function (response) {
                if (response.status == 1) {
                    btn.html("Deletar");
                    $(".alert-success").removeClass("display-none");
                    $(".alert-success div").text(response.mensagem);
                    setTimeout(function() {
                        window.location.reload();
                    }, 1500);
                } else {
                    btn.html("Deletar");
                    $(".alert-danger").removeClass("display-none");
                    $(".alert-danger div").text(response.mensagem);
                }
            },
        });
    });
});