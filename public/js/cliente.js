var url = 'clienteController.php';

$(document).ready(function () {
    $("body").on("click", "#updateCliente", function () {
        console.log("teste");
        var updateCliente = "update";
        var idcliente = $("#idcliente").val();
        var nome = $("#nome").val();
        var sobrenome = $("#sobrenome").val();
        var cpf = $("#cpf").val();
        var endereco = $("#endereco").val();
        var telefone = $("#telefone").val();

        $.ajax({
            url: 'clienteController.php',
            method: 'POST',
            data: {
                updateCliente: updateCliente,
                idcliente: idcliente,
                nome: nome,
                sobrenome: sobrenome,
                cpf: cpf,
                endereco: endereco,
                telefone: telefone
            },
            success: function (data) {
                alert(data);
            }
        });
    });

    $("body").on("click", ".delete", function () {
        var deletecliente = "delete";
        var idcliente = $(this).attr("value");
        var tr = $(this).closest('tr');

        $.ajax({
            url: 'clienteController.php',
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
            url: 'clienteController.php',
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
