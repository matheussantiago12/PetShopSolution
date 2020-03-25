var teste = false;

function limparDados() {
    var inputs = document.getElementsByTagName("input");
    if (teste) {
        for (var i = 1; i < inputs.length; i++) {
            if (inputs[i].type == "text" || inputs[i].type == "datetime-local" || inputs[i].type == "date" || inputs[i].type == "email") {
                inputs[i].value = "";
            }
        }
    }
}

function habilitarInputs() {
    var inputs = document.getElementsByClassName("clear");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }
    teste = true;
}

function mostrarRegistro() {
    document.getElementById("registro").style.display = "flex";
}

function esconderRegistro() {
    document.getElementById("registro").style.display = "none";
}

$(document).ready(function () {
    $(".filtro").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $(".filtro-select").on("change", function () {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
