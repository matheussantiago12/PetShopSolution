var url = 'consultaController.php';

var validPet = false;
var validVeterinario = false;
var validData = false;

function validaConsulta(pet, veterinario, data) {
    if(pet > 0) {
        validPet = true;
        $("#pet").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#pet").css("border", "1px solid red");
    }
    if(veterinario > 0) {
        validVeterinario = true;
        $("#veterinario").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#veterinario").css("border", "1px solid red")
    }
    if(data != "") {
        validData = true;
        $("#data").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#data").css("border", "1px solid red");
    }
}

$(document).ready(function () {
    $("body").on("click", "#updateConsulta", function () {
        console.log("teste");
        var updateconsulta = "update";
        var idconsulta = $("#idconsulta").val();
        var idveterinario = $("#veterinario").val();
        var idanimal = $("#pet").val();
        var idstatus = $("#idstatus").val();
        var data = $("#data").val();
        var observacoes = $("#observacoes").val();
        console.log(idveterinario);
        console.log(idanimal);
        validaConsulta(idanimal, idveterinario, data);
        
        if(validPet && validVeterinario && validData) {
            $(".form-validation-consulta").css("display", "none");
            $(".form input").css("border", "1px solid rgb(190, 190, 190)");
            $(".form select").css("border", "1px solid rgb(190, 190, 190)");
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    updateconsulta: updateconsulta,
                    idconsulta: idconsulta,
                    idveterinario: idveterinario,
                    idanimal: idanimal,
                    idstatus: idstatus,
                    data: data,
                    observacoes: observacoes
                },
                success: function (data) {
                    alert(data);
                }
            });
            validNome = false;
            validSobrenome = false;
            validCpf = false;
        } else {
            $(".form-validation-consulta").css("display", "block");
        }
    });

    $("body").on("click", "#createConsulta", function () {
        var create = "create";
        var idveterinario = $("#veterinario").val();
        var idanimal = $("#pet").val();
        var data = $("#data").val();
        var observacoes = $("#observacoes").val();
        validaConsulta(idanimal, idveterinario, data);
        
        if(validPet && validVeterinario && validData) {
            $(".form-validation-consulta").css("display", "none");
            $(".form input").css("border", "1px solid rgb(190, 190, 190)");
            $(".form select").css("border", "1px solid rgb(190, 190, 190)");
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
            validNome = false;
            validSobrenome = false;
            validCpf = false;
        } else {
            $(".form-validation-consulta").css("display", "block");
        }
        
    });
});
