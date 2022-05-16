$('button[name="insertar"]').on('click', function() {
    $.ajax({
        url: urlAjax,
        type: "POST",
        dataType: "JSON",
        data: {
            titulo: $('#form1').val(),
            etiqueta: $('#form2').val(),
            descripcion: $('#form3').val(),
            insertar: 1,
        },
        beforeSend: function() {
            console.table({
                titulo: $('#form1').val(),
                etiqueta: $('#form2').val(),
                descripcion: $('#form3').val(),
                insertar: 1
            });

        }
    }).done(function(id) {
        console.log('respussta ok', id);

        var nuevaTarea = '<tr>' +
            '<td>' + $('#form1').val() + '</td>' +
            '<td>' + $('#form2').val() + '</td>' +
            '<td>' + $('#form3').val() + '</td>' +
            '<td>' +
            '<form method="POST" action="funciones.php" style="display: flex;">' +
            '<button name="eliminar" type="submit" class="btn btn-danger">Borrar</button>' +
            '<button name="finalizar" type="submit" class="btn btn-success ms-1">Finalizar</button>' +
            '<input type="hidden" name="id" value="' + id + '">' +
            '</form>' +
            '</td>' +
            '</tr>';

        $('#tareas_pendientes tbody').append(nuevaTarea);


    }).fail(function(xhr, texterror, error) {
        console.log([xhr, texterror, error]);
    });
});