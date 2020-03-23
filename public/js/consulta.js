var url = 'consultaController.php';

$(document).ready(function () {
    $("body").on("click", "#updateConsulta", function () {
        console.log("teste");
        var updateconsulta = "update";
        var idconsulta = $("#idconsulta").val();
        var idveterinario = $("#idveterinario").val();
        var idanimal = $("#idanimal").val();
        var idstatus = $("#idstatus").val();
        var data = $("#data").val();
        var observacoes = $("#observacoes").val();

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
