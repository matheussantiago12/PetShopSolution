var url = 'vacinaController.php';

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

});
