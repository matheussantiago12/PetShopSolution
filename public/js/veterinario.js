var url = 'veterinarioController.php';

$(document).ready(function () {
    $("#update").click(function () {
        console.log("teste")
        var update = "update";
        var idveterinario = $("#idveterinario").val();
        var nome = $("#nome").val();
        var sobrenome = $("#sobrenome").val();
        var cpf = $("#cpf").val();
        var email = $("#email").val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                update: update,
                idveterinario: idveterinario,
                nome: nome,
                sobrenome: sobrenome,
                cpf: cpf,
                email: email
            },
            success: function (response) {
                alert(response);
            }
        });
    });

    $("body").on("click", ".delete", function () {
        var deletevet = "delete";
        var idveterinario = $(this).attr("value");
        var tr = $(this).closest('tr');

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                deletevet: deletevet,
                idveterinario: idveterinario
            },
            success: function (response) {
                console.log("teste");
                tr.fadeOut(500, function () {
                    $(this).remove();
                });
            }
        });
    });

    $("body").on("click", "#createButton", function () {
        var create = "create";
        var nome = $("#nome").val();
        var sobrenome = $("#sobrenome").val();
        var cpf = $("#cpf").val();
        var email = $("#email").val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                create: create,
                nome: nome,
                sobrenome: sobrenome,
                cpf: cpf,
                email: email
            },
            success: function (response) {
                $("table").load(" table > *");
                limparDados();
            }
        });
        $("table").load(" table > *");
        limparDados();
    });

});
