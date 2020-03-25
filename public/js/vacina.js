var url = 'vacinaController.php';

var validTipo = false;
var validVeterinario = false;
var validData = false;

function validaVeterinario(tipo, veterinario, data) {
    if (tipo.length >= 1) {
        validTipo = true;
        $("#tipovacina").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#tipovacina").css("border", "1px solid red");
    }
    if (veterinario > 0) {
        validVeterinario = true;
        $("#veterinario").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#veterinario").css("border", "1px solid red")
    }
    if (data != "") {
        validData = true;
        $("#data").css("border", "1px solid rgb(190, 190, 190)");
    } else {
        $("#data").css("border", "1px solid red");
    }
}

$(document).ready(function () {
    $("body").on("click", "#update", function () {
        console.log("teste");
        var updatevacina = "updatevacina";
        var idvacina = $("#idvacina").val();
        var nome = $("#nome").val();
        var data = $("#data").val();
        var idveterinario = $("#idveterinario").val();
        var idanimal = $("#idanimal").val();

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                updatevacina: updatevacina,
                idvacina: idvacina,
                nome: nome,
                data: data,
                idveterinario: idveterinario,
                idanimal: idanimal
            },
            success: function (response) {
                alert(response);
            }
        });
    });

    $("body").on("click", "#delete", function () {
        console.log("teste");
        var deletevacina = "delete";
        var idvacina = $("#idvacina").val();

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                deletevacina: deletevacina,
                idvacina: idvacina,
            },
            success: function (response) {
                alert(response);
                history.go(-1);
            }
        });
    });

    $("body").on("click", "#createVacina", function () {
        var vacina = "vacina";
        var nomevacina = $("#tipovacina").val();
        var idveterinario = $("#veterinario").val();
        var idanimal = $("#idpet").val();
        var data = $("#data").val();
        validaVeterinario(nomevacina, idveterinario, data);
        if (validTipo && validVeterinario && validData) {
            $(".form-validation-vacina").css("display", "none");
            $(".form input").css("border", "1px solid rgb(190, 190, 190)");
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
                success: function (data) {
                    alert(data);
                    $(".otherInfos").load(" .otherInfos > *");
                }
            });
            validTipo = false;
            validVeterinario = false;
            validData = false;
        } else {
            $(".form-validation-vacina").css("display", "block"); 
        }
    });

});
