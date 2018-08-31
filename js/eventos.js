$(document).ready(function () {

    $('#calendar').css('background-color', 'white');
    $('.clockpicker').clockpicker();
});
var cal = $('#calendar').fullCalendar({
    header: {
        left: 'today,prev,next,Miboton',
        center: 'title',
        right: 'month, basicWeek, basicDay, agendaWeek, agendaDay'
    },
    customButtons: {

    },
    dayClick: function (date, jsEvent, view) {
        $('#md_add_event').modal('show');
        $("#formGuardar")[0].reset();
        $("#add_titulo").html("Agregando");
        $("#btm_del").hide();
        $("#accion").val("agregar");
        date = date.format();
        console.log(date);

        fecha = moment(date).format('YYYY-MM-DD');
        hora = moment(date['_d']).format('hh:mm');

        $("#start").val(fecha);
        $("#startH").val(hora);

        $("#end").val(fecha);
        $("#endH").val('23:59');

    },
    events: function (start, end, timezone, callback) {
        $.ajax({
            url: 'controller/eventos.php?eventos=1',
            dataType: 'json',
            data: {
                // our hypothetical feed requires UNIX timestamps
                start: start.unix(),
                end: end.unix()
            },
            success: function (doc) {
                var events = doc;
                console.log(events)
                callback(events);
            }
        });
    },

    eventClick: function (calEvent, jsEvent, view) {
        $("#add_titulo").html(calEvent.title);
        $("#add_titulo").html("Editar");
        $("#accion").val("editar");
        $("#title").val(calEvent.title);
        $("#descrip").val(calEvent.descrip);
        $("#color").val(calEvent.color);
        $("#textColor").val(calEvent.textColor);

        $("#idEvent").val(calEvent.id);
        $("#idDelt").val(calEvent.id);
        $("#btm_del").show();

        FechaHora = calEvent.start._i.split(" ");
        $("#start").val(FechaHora[0]);
        $("#startH").val(FechaHora[1]);
        FechaHora2 = calEvent.end._i.split(" ")

        $("#end").val(FechaHora2[0]);
        $("#endH").val(FechaHora2[1]);


        $('#md_add_event').modal('show');
    }


});
function add(e) {
    e.preventDefault();
    let frm = $("#formGuardar").serialize();
    $.ajax({
        url: 'controller/eventos.php',
        method: 'POST',
        data: frm,
        success: function () {
            $('#md_add_event').modal('hide');
            cal.fullCalendar('refetchEvents');
            toastr.success('Agendado Correctamente');
        }
    });
}

function del(e) {

    e.preventDefault();
    let frm = $("#formDel").serialize();
    $.ajax({
        url: 'controller/eventos.php',
        method: 'POST',
        data: frm,
        success: function () {
            $('#md_del').modal('hide');
            cal.fullCalendar('refetchEvents');
            toastr.success('Eliminado Correctamente');
        }
    });
}

function confirm(e) {
    e.preventDefault();
    $('#md_add_event').modal('hide');
    $('#md_del').modal('show');
}