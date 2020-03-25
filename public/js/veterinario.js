var url = 'veterinarioController.php';

var validNomeVeterinario = false;
var validSobrenomeVeterinario = false;
var validCPFVeterinario = false;
var validEmail = false;

function validaVeterinario(nome, sobrenome, cpf, email) {
    if (nome.length >= 2) {
        validNomeVeterinario = true;
        $("#nome").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#nome").css("border", "1px solid red");
    }
    if (sobrenome.length >= 2) {
        validSobrenomeVeterinario = true;
        $("#sobrenome").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#sobrenome").css("border", "1px solid red")
    }
    if (cpf.length == 11) {
        validCPFVeterinario = true;
        $("#cpf").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#cpf").css("border", "1px solid red");
    }
    if (email.includes("@") && email.includes(".")) {
        $("#email").css("border", "1px solid rgb(190, 190, 190)");
        validEmail = true;
    } else {
        $("#email").css("border", "1px solid red");
    }
}

$(document).ready(function () {
    $("#update").click(function () {
        console.log("teste")
        var update = "update";
        var idveterinario = $("#idveterinario").val();
        var nome = $("#nome").val();
        var sobrenome = $("#sobrenome").val();
        var cpf = $("#cpf").val();
        var email = $("#email").val();
        validaVeterinario(nome, sobrenome, cpf, email);
        if (validNomeVeterinario && validSobrenomeVeterinario && validCPFVeterinario && validEmail) {
            $(".form-validation").css("display", "none");
            $(".form input").css("border", "1px solid rgb(190, 190, 190)");
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
            validNome = false;
            validSobrenome = false;
            validCpf = false;
        } else {
            $(".form-validation").css("display", "block");
        }
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
        validaVeterinario(nome, sobrenome, cpf, email);
        if (validNomeVeterinario && validSobrenomeVeterinario && validCPFVeterinario && validEmail) {
            $(".form-validation").css("display", "none");
            $(".form input").css("border", "1px solid rgb(190, 190, 190)");
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
                    teste = true;
                    limparDados();
                    teste = false;
                }
            });
            validNomeVeterinario = false;
            validSobrenomeVeterinario = false;
            validCPFVeterinario = false;
            validEmail = false;
        } else {
            $(".form-validation").css("display", "block");
        }
        $("table").load(" table > *");
        limparDados();
    });

});
