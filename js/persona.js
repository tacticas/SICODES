$(document).ready(function() {
    $('#example').DataTable( {
    	ajax: 'controller/persona.php',
    	columns: [
        { data: 'idUsuario' },
        { data: 'matricula' },
        { data: 'nombre' },
        { data: 'apPaterno' },
        { data: 'apMaterno' },
        { data: 'eMail' },
        { data: 'telefono' },
        { data: 'idEscuela' }
        
    	],
        dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-sm-12"p><"col-sm-6"i>>',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        lengthMenu: [ 10, 25, 50, 75, 100 ]
    } );
} );  

function imprimetabla(){
       $.ajax({
                url: 'controller/persona.php', 
                type:'post', 
               	data: 'data'
          
        });
   
   }
