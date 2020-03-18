var url = 'clienteController.php';

$(document).ready(function () {
    $("body").on("click", "#update", function () {
        console.log("teste");
        var update = "update";
        var idcliente = $("#idcliente").val();
        var nome = $("#nome").val();
        var sobrenome = $("#sobrenome").val();
        var cpf = $("#cpf").val();
        var endereco = $("#endereco").val();
        var telefone = $("#telefone").val();

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                update: update,
                idcliente: idcliente,
                nome: nome,
                sobrenome: sobrenome,
                cpf: cpf,
                endereco: endereco,
                telefone: telefone
            },
            success: function (response) {
                alert(response);
            }
        });
    });

    $("body").on("click", ".delete", function () {
        var deletecliente = "delete";
        var idcliente = $(this).attr("value");
        var tr = $(this).closest('tr');

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                deletecliente: deletecliente,
                idcliente: idcliente
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
        var endereco = $("#endereco").val();
        var telefone = $("#telefone").val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                create: create,
                nome: nome,
                sobrenome: sobrenome,
                cpf: cpf,
                endereco: endereco,
                telefone: telefone
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
