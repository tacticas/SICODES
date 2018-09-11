$(document).ready(function () {
    schedule();
    homework();
    cStatus();
    tb_cprogress();
    messages();
    eventos();
    fechaPago();
    $("#nav_dash").addClass("active");
    $("#tb_horario_wrapper").css('padding: 0;');

});


function schedule() {
    var table = $('#tb_horario').DataTable({
        ajax: 'controller/dashboard.php?schedule=1',
        dom: '',
        columns: [
            { data: 'nombre' },
            { data: 'cursoN' },
            { data: 'ini' },
            { data: 'fin' }
        ],
        select: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "columnDefs": [
            {
                "targets": [],
                "visible": false
            },
        ]
    });

}
function cStatus() {
    var table = $('#tb_cstatus').DataTable({
        ajax: 'controller/dashboard.php?courseStatus=1',
        dom: '',
        columns: [
            { data: 'nombre' },
            {
                data: 'hm',
                render: function (data) {
                    return data + " %"
                }
            },
            {
                data: 'rd',
                render: function (data) {
                    return data + " %"
                }
            },
            {
                data: 'wr',
                render: function (data) {
                    return data + " %"
                }
            },
            {
                data: 'sp',
                render: function (data) {
                    return data + " %"
                }
            },
            {
                data: 'li',
                render: function (data) {
                    return data + " %"
                }
            }
        ],
        select: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "columnDefs": [
            {
                "targets": [],
                "visible": false
            },
        ]
    });

}
function tb_cprogress() {
    var table = $('#tb_cprogress').DataTable({
        ajax: 'controller/dashboard.php?courseProgress=1',
        dom: '',
        columns: [
            { data: 'nombre' },
            { data: 'date' },
            { data: 'lesson' },
            {
                data: 'book',
                render: function (data) {
                    switch (data) {
                        case '0':
                            return 'Undelivered';
                            break;
                        case '1':
                            return 'Reviewing';
                            break;
                        case '2':
                            return 'Approved';
                            break;
                    
                        default:
                            break;
                    }
         
                }
            },
            {
               
                data: 'dictation',
                render: function (data) {
                    switch (data) {
                        case '0':
                            return 'Undelivered';
                            break;
                        case '1':
                            return 'Reviewing';
                            break;
                        case '2':
                            return 'Approved';
                            break;
                    
                        default:
                            break;
                    }
         
                }
            },
            { data: 'quiz' },
            { data: 'test' },
            { data: 'oral_quiz' },
            { data: 'oral_test' }
        ],
        select: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "columnDefs": [
            {
                "targets": [],
                "visible": false
            },
        ]
    });

}


function messages() {
    var table = $('#tb_messages').DataTable({
        ajax: 'controller/dashboard.php?getMensajes=1',
        dom: '',
        columns: [
            {
                data: null,
                render: function (data, type, row) {
                    return data.tx_name+" "+data.tx_ap1;
                }
            },
            { data: 'titulo'},
            { data: 'created_at'},
            {
                data: null,
                render: function (data, type, row) {
                    switch (data.status) {
                        case "0":
                            r = '<span class="badge badge-pill badge-primary">new</span>';
                            break;
                        default:
                            r = "No especificado";
                            break;
                    }
                    return r;
                }
            }
        ],
        select: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "columnDefs": [
            {
                "targets": [],
                "visible": false
            },
        ]
    });

}
function homework() {
    var table = $('#tb_homework').DataTable({
        ajax: 'controller/dashboard.php?homework=1',
        dom: '',
        columns: [
            { data: 'nombre' },
            {
                data: 'alcance',
                render: function (data) {
                    if (data == 'n') {
                        return 'Group';
                    } else {
                        return 'Individual';
                    }

                }
            },
            { data: 'tema' },
            {
                data: 'tipo',
                render: function (data, type, row) {
                    var r = "";
                    switch (data) {
                        case "1":
                            r = "Speaking";
                            break;
                        case "2":
                            r = "Reading";
                            break;
                        case "3":
                            r = "Writing";
                            break;
                        case "4":
                            r = "Listening";
                            break;
                        default:
                            r = "No especificado";
                            break;
                    }
                    return r;
                }
            },
        ],
        select: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "columnDefs": [
            {
                "targets": [],
                "visible": false
            },
        ]
    });

}

//calendar

var cal = $('#calendar').fullCalendar({
    default: 'bootstrap4',
    header: {
        left: 'today,prev,next,Miboton',
        center: 'title',
        right: 'month'
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

//eventos

function eventos() {
    $.ajax({
        method: 'POST',
        url: 'controller/dashboard.php?getEventos=1',
        dataType: 'json',
        success: function (data) {
            var myHtml  = '';
            array = data['data'];
            $.each(array, function (index, value) {
                var dia = parseInt(value.start.substr(8,10));
                var mesn = parseInt(value.start.substr(5,7));
                var mes = '';
                switch (mesn) {
                    case 1:
                        mes = 'JAN';
                        break;
                    case 2:
                        mes = 'FEB';
                        break;
                    case 3:
                        mes = 'MAR';
                        break;
                    case 4:
                        mes = 'APR';
                        break;
                    case 5:
                        mes = 'MAY';
                        break;
                    case 6:
                        mes = 'JUN';
                        break;
                    case 7:
                        mes = 'JUL';
                        break;
                    case 8:
                        mes = 'AUG';
                        break;
                    case 9:
                        mes = 'SEP';
                        break;
                    case 10:
                        mes = 'OCT';
                        break;
                    case 11:
                        mes = 'NOV';
                        break;
                    case 12:
                        mes = 'DEC';
                        break;
                
                    default:
                        break;
                }
           
                myHtml +=` <div class="flex-item-c">
                            <div class="flex-item limpio cal">
                                <div class="numero">${dia}</div>
                                <div>${mes}</div>
                            </div>
                            <div class="flex-item-3">
                                <h4>${value.title}</h4>
                                <p>${value.descrip}.</p>
                            </div>
                        </div> `;
            });
            $("#eventos2").html(myHtml);
        }
    });
}

function fechaPago(){
    $.ajax({
        method: 'POST',
        url: 'controller/dashboard.php?getInfo=1',
        dataType: 'json',
        success: function (data) {
            var fPago = data['data'][0].fechaPago;
            var fActual  = data['data'][0].fActual;
            var x1 = parseInt( fPago.substr(8,9));
            var x2 = parseInt( fActual.substr(8,9));
            var days = x2 - x1;
            if(days >= 0 && days <6 ){
                if(days == 0){
                    $("#fechaPago").html('Your payment date is today');
                }else{
                    $("#fechaPago").html('Your payment date is next to '+days+' day(s)');
                }
                
                $("#divFechaPago").show();
                console.log('entre');
            }
           
    
          
        }
    });
}
//info
function myInfo(){
    $("#md_info").modal("show");
    $.ajax({
        method: 'POST',
        url: 'controller/dashboard.php?getInfo=1',
        dataType: 'json',
        success: function (data) {
            var htmlInfo = '';
            array = data['data'];
            $.each(array, function (index, value) {
                htmlInfo += `
                    <div class="table-responsive sinEspacio">
                        <table class="table">
                            <tr>
                                <td>Address</td>
                                <td>${value.dir}</td>
                            </tr>
                            <tr>
                                <td>Goal</td>
                                <td>${value.meta}</td>
                            </tr>
                            <tr>
                                <td>Evaluation</td>
                                <td>${value.evaluacion}</td>
                            </tr>
                            <tr>
                                <td>Fecha Pago</td>
                                <td>${value.fechaPago}</td>
                            </tr>
                            <tr>
                                <td>Fecha Ingreso</td>
                                <td>${value.fIngreso}</td>
                            </tr>
                        </table>
                </div>
                
                `;
            });
            $("#divInfo").html(htmlInfo);
        }
    });
}