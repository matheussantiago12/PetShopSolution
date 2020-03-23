$(document).ready(function () {
    $("#updatePet").click(function () {
        var update = "update";
        var idanimal = $("#idpet").val();
        var idcliente = $("#idcliente").val();
        var nome = $("#nome").val();
        var tipo = $("#tipo").val();
        var raca = $("#raca").val();
        var nascimento = $("#nascimento").val();
        var descricao = $("#descricao").val();
        console.log("Id Cliente: "+idcliente);
        $.ajax({
            url: 'petController.php',
            method: 'POST',
            data: {
                update: update,
                idanimal: idanimal,
                nome: nome,
                tipo: tipo,
                raca: raca,
                nascimento: nascimento,
                descricao: descricao,
                idcliente: idcliente
            },
            success: function (data) {
                alert(data);
            }
        });
    });
    

    $("body").on("click", ".delete", function () {
        var deletepet = "delete";
        var idanimal = $(this).attr("value");
        var tr = $(this).closest('tr');

        $.ajax({
            url: 'petController.php',
            method: 'POST',
            data: {
                deletepet: deletepet,
                idanimal: idanimal
            },
            success: function (response) {
                console.log("teste");
                tr.fadeOut(500, function () {
                    $(this).remove();
                });
            }
        });
    });

    $("body").on("click", "#createPet", function () {
        console.log("teste");
        var submit = "submit";
        var nome = $("#nome").val();
        var tipo = $("#tipo").val();
        var nascimento = $("#data").val();
        var idcliente = $("#cliente").val();
        var descricao = $("#descricao").val();
        var raca = $("#raca").val();
        console.log(nome);
        $.ajax({
            url: 'petController.php',
            method: 'POST',
            data: {
                submit: submit,
                nome: nome,
                tipo: tipo,
                nascimento: nascimento,
                idcliente: idcliente,
                descricacao: descricao,
                raca: raca
            },
            success: function (response) {
                console.log("teste");
            }
        });
        $("table").load(" table > *");
        $("div").load(" .otherInfos > *");
        limparDados();
    });

    $("body").on("click", "#createPetAlt", function () {
        console.log("testess");
        var submit = "submit";
        var idcliente = $("#idcliente").val();
        var nome = $("#nomePet").val();
        var tipo = $("#tipoPet").val();
        var raca = $("#raca").val();
        var nascimento = $("#dataPet").val();
        var descricao = $("#descricao").val();
        $.ajax({
            url: 'petController.php',
            method: 'POST',
            data: {
                submit: submit,
                nome: nome,
                tipo: tipo,
                nascimento: nascimento,
                idcliente: idcliente,
                descricao: descricao,
                raca: raca
            },
            success: function (response) {
                console.log("teste");
                teste = true;
                limparDados();
                teste = false;
            }
        });
        $(".otherInfos").load(" .otherInfos > *");
    });

    $("body").on("click", "#createVacina", function () {
        console.log("testeeee");
        var vacina = "vacina";
        var nomevacina = $("#tipovacina").val();
        var idveterinario = $("#veterinario").val();
        var idanimal = $("#idpet").val();
        var data = $("#data").val();
        console.log(vacina);
        console.log(nomevacina);
        console.log(idveterinario);
        console.log(idanimal);
        console.log(data);

        $.ajax({
            url: 'petController.php',
            method: 'POST',
            data: {
                vacina: vacina,
                nomevacina: nomevacina,
                idveterinario: idveterinario,
                idanimal: idanimal,
                data: data
            },
            success: function (response) {
                alert(response);
            }
        });
        
    });

});
