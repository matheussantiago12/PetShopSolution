var teste = false;

function limparDados() {
    var inputs = document.getElementsByTagName("input");
    if (teste) {
        for (var i = 1; i < inputs.length - 1; i++) {
            if (inputs[i].type == "text" || inputs[i].type == "datetime-local" || inputs[i].type == "date") {
                inputs[i].value = "";
            }
        }
    }
}

function habilitarInputs() {
    var inputs = document.getElementsByTagName("input");
    for (var i = 1; i < inputs.length - 1; i++) {
        inputs[i].disabled = false;
    }

    var selects = document.getElementsByTagName("select");
    if (selects.length != 0) {
        for (var i = 0; i < selects.length; i++) {
            selects[i].disabled = false;
        }
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
    $("#filtro").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#tabela tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
