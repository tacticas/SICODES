$(document).ready(function () {

    $('#calendar').css('background-color', 'white');
    $('.clockpicker').clockpicker();
});
var cal = $('#calendar').fullCalendar({
    default: 'bootstrap4',
    header: {
        left: 'today,prev,next,Miboton',
        center: 'title',
        right: 'month, basicWeek, basicDay, agendaWeek, agendaDay'
    },
    customButtons: {

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
              
                callback(events);
            }
        });
    },

    eventClick: function (calEvent, jsEvent, view) {
        $("#add_titulo").html(calEvent.title);
   
        $("#descrip").html(calEvent.descrip);
       
        FechaHora = calEvent.start._i.split(" ");
        $("#start").val(FechaHora[0]);
        $("#startH").val(FechaHora[1]);
        FechaHora2 = calEvent.end._i.split(" ")

        $("#end").val(FechaHora2[0]);
        $("#endH").val(FechaHora2[1]);


        $('#md_add_event').modal('show');
    }


});
