var url = 'consultaController.php';

$(document).ready(function () {
    $("body").on("click", "#update", function () {
        console.log("teste");
        var updateconsulta = "update";
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

    $("body").on("click", "#createConsulta", function () {
        console.log("testeeee");
        var create = "create";
        var idveterinario = $("#veterinario").val();
        var idanimal = $("#pet").val();
        var data = $("#data").val();
        var observacoes = $("#observacoes").val();
        console.log(idveterinario);
        console.log(idanimal);
        console.log(data);
        console.log(observacoes);
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                create: create,
                idveterinario: idveterinario,
                idanimal: idanimal,
                data: data,
                observacoes: observacoes
            },
            success: function (data) {
                alert("Consulta cadastrada");
            }
        });
    });

    $("#cliente").keyup(function(event){
        if(window.event.keyCode === 13) {
            var datalist = document.getElementById("clientes");
            for (var i = 0; i < datalist.length; i++) {
                var txt = datalist.options[i].text;
                var include = txt.toLowerCase().startsWith(keyword.toLowerCase());
                datalist.options[i].style.display = include ? 'list-item':'none';
            }       
        }
    });

});
