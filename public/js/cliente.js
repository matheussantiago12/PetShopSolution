var url = 'clienteController.php';

var validNome = false;
var validSobrenome = false;
var validCpf = false;
var validEndereco = false;
var validTelefone = false;

function validaCliente(nome, sobrenome, cpf, telefone, endereco) {
    if(nome.length >= 2) {
        validNome = true; 
        $("#nome").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#nome").css("border", "1px solid red");
    }
    if(sobrenome.length >= 2) {
        validSobrenome = true;
        $("#sobrenome").css("border", "1px solid rgb(190, 190, 190)")
    } else {
        $("#sobrenome").css("border", "1px solid red")
    }
    if(cpf.length == 11) {
        validCpf = true;
        $("#cpf").css("border", "1px solid rgb(190, 190, 190)")
    } else {
        $("#cpf").css("border", "1px solid red");
    }
    if(endereco.length >= 4) {
        validEndereco = true;
        $("#endereco").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#endereco").css("border", "1px solid red");
    }
    if(telefone.length >= 8) {
        validTelefone = true;
        $("#telefone").css("border", "0px");
    } else {
        $("#telefone").css("border", "1px solid red");
    }
}

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
        validaCliente(nome, sobrenome, cpf, endereco, telefone);

        if(validNome && validSobrenome && validCpf && validEndereco && validTelefone) {
            $(".form-validation").css("display", "none");
            $(".form input").css("border", "1px solid rgb(190, 190, 190)");
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
            validNome = false;
            validSobrenome = false;
            validCpf = false;
            validTelefone = false;
            validEndereco = false;
        } else {
            $(".form-validation").css("display", "block");
        }
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
            success: function (data) {
                alert("Registro apagado");
                tr.fadeOut(500, function () {
                    $(this).remove();
                });
            }
        });
    });

    $("body").on("submit", "#registerCliente", function (e) {
        e.preventDefault();
        var create = "create";
        var nome = $("#nome").val();
        var sobrenome = $("#sobrenome").val();
        var cpf = $("#cpf").val();
        var endereco = $("#endereco").val();
        var telefone = $("#telefone").val();
        validaCliente(nome, sobrenome, cpf, endereco, telefone);

        if(validNome && validSobrenome && validCpf && validEndereco && validTelefone) {
            $(".form-validation").css("display", "none");
            $(".cabecalhoRegistro input").css("border", "0px");
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
                    teste = true;
                    limparDados();
                    teste = false;
                }
            });
            validNome = false;
            validSobrenome = false;
            validCpf = false;
            validTelefone = false;
            validEndereco = false;
        } else {
            $(".form-validation").css("display", "block");
        }
        $("table").load(" table > *");
        limparDados();  
    });
});
