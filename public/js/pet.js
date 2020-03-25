var validNomePet = false;
var validRaca = false;
var validNascimento = false;
var validCliente = false;

function validaPet(nome, raca, nascimento) {
    if(nome.length >= 1) {
        validNomePet = true;
        $("#nomePet").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#nomePet").css("border", "1px solid red");
    }
    if(raca.length >= 2) {
        validRaca = true;
        $("#raca").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#raca").css("border", "1px solid red")
    }
    if(nascimento != "") {
        validNascimento = true;
        $("#dataPet").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#dataPet").css("border", "1px solid red");
    }
}

function validaPetCliente(cliente) {
    if(cliente > 0) {
        validCliente = true;
        $("#idcliente").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#idcliente").css("border", "1px solid red");
    }
}

$(document).ready(function () {
    $("#updatePet").click(function () {
        var update = "update";
        var idanimal = $("#idpet").val();
        var idcliente = $("#idcliente").val();
        var nome = $("#nomePet").val();
        var tipo = $("#tipo").val();
        var raca = $("#raca").val();
        var nascimento = $("#dataPet").val();
        var descricao = $("#descricao").val();
        var property = document.getElementById("foto").files[0];
        console.log(property);
        validaPet(nome, raca, nascimento);
        validaPetCliente(idcliente);
        if(validNomePet==true && validRaca==true && validNascimento==true && validCliente==true) {
            $(".form-validation-pet").css("display", "none");
            $(".form input").css("border", "1px solid rgb(190, 190, 190)");
            $(".form select").css("border", "1px solid rgb(190, 190, 190)");
            var allData = new FormData();
            allData.append('update', update);
            allData.append('idcliente', idcliente);
            allData.append('idanimal', idanimal);
            allData.append('nome', nome);
            allData.append('tipo', tipo);
            allData.append('raca', raca);
            allData.append('nascimento', nascimento);
            allData.append('descricao', descricao);
            allData.append('file', property); 
            $.ajax({
                url: 'petController.php',
                method: 'POST',
                cache : false,
                processData: false,
                contentType : false,
                processType : false,
                data: allData,
                success: function (data) {
                    alert(data);
                }
            });
        } else {
            $(".form-validation-pet").css("display", "block");
        }
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
        var property = document.getElementById("foto").files[0];
        validaPet(nome, raca, nascimento);
        if(validNomePet==true && validRaca==true && validNascimento==true) {
            $(".form-validation-pet").css("display", "none");
            $(".form input").css("border", "1px solid rgb(190, 190, 190)");
            $(".form select").css("border", "1px solid rgb(190, 190, 190)");
            var allData = new FormData();
            allData.append('submit', submit);
            allData.append('idcliente', idcliente);
            allData.append('nome', nome);
            allData.append('tipo', tipo);
            allData.append('raca', raca);
            allData.append('nascimento', nascimento);
            allData.append('descricao', descricao);
            allData.append('file', property);
            $.ajax({
                url: 'petController.php',
                method: 'POST',
                cache : false,
                processData: false,
                contentType : false,
                processType : false,
                data: allData,
                success: function (data) {
                    alert(data);
                    teste = true;
                    limparDados();
                    teste = false;
                    $(".testee").load(" .testee > *");
                }
            });
            validNomePet = false;
            validRaca = false;
            validNascimento = false;
        } else {
            $(".form-validation-pet").css("display", "block");
        }   
        $(".testee").load(" .testee > *");
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
            success: function (data) {
                //alert(data);
                tr.fadeOut(500, function () {
                    $(this).remove();
                });
            }
        });
    });

    $("body").on("click", "#excluirPet", function () {
        var deletepet = "delete";
        var idanimal= $("#excluirPet").val();

        $.ajax({
            url: 'petController.php',
            method: 'POST',
            data: {
                deletepet: deletepet,
                idanimal: idanimal,
            },
            success: function (response) {
                alert(response);
                history.go(-1);
            }
        });
    });

    // $("body").on("click", "#createPet", function () {
    //     console.log("teste");
    //     var submit = "submit";
    //     var nome = $("#nome").val();
    //     var tipo = $("#tipo").val();
    //     var nascimento = $("#data").val();
    //     var idcliente = $("#cliente").val();
    //     var descricao = $("#descricao").val();
    //     var raca = $("#raca").val();
    //     $.ajax({
    //         url: 'petController.php',
    //         method: 'POST',
    //         data: {
    //             submit: submit,
    //             nome: nome,
    //             tipo: tipo,
    //             nascimento: nascimento,
    //             idcliente: idcliente,
    //             descricacao: descricao,
    //             raca: raca
    //         },
    //         success: function (response) {
    //             console.log("teste");
    //         } 
    //     });
    //     $("table").load(" table > *");
    //     $(".otherInfos").load(" .otherInfos > *");
    //     limparDados();
    // });


    

});
