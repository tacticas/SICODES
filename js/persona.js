$(document).ready(function() {
    $('#example').DataTable( {
        dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-sm-6"i><"col-sm-6"p>>',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        lengthMenu: [ 10, 25, 50, 75, 100 ]

    } );
} );  

