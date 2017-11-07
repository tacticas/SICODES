<footer class="footer">
	<div class="container">
        <span class="text-muted pull-right">© Copyright 2018 - Automatix. All rights reserved.</span>
    </div>
</footer>
<!-- SCRIPTS -->
	<script type="text/javascript" src="assets/Buttons-1.4.2/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="assets/bootstrap4/js/tether.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap4/js/notify.min.js"></script>
	
	
	
	<script type="text/javascript" src="assets/DataTables-1.10.16/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="assets/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
	
	<script type="text/javascript" src="assets/Buttons-1.4.2/js/dataTables.buttons.js"></script>
	<script type="text/javascript" src="assets/Buttons-1.4.2/js/buttons.bootstrap4.js"></script>
	<script type="text/javascript" src="assets/Buttons-1.4.2/js/buttons.flash.min.js"></script>

	<script type="text/javascript" src="assets/Buttons-1.4.2/js/jszip.min.js"></script>
	<script type="text/javascript" src="assets/Buttons-1.4.2/js/pdfmake.min.js"></script>
	<script type="text/javascript" src="assets/Buttons-1.4.2/js/vfs_fonts.js"></script>
	<script type="text/javascript" src="assets/Buttons-1.4.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="assets/Buttons-1.4.2/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="assets/DataEdit/dataTables.editor.js"></script>


	

	<script type="text/javascript" src="js/persona.js"></script>

	

</div>
</body>
</html>

<?php 

	if (isset($_GET['alerta'])) {
			if ($_GET['alerta'] == 1) {
				echo '<script language="javascript">toastr.success("Agregado Correctamente.");</script>'; 
			}
			if ($_GET['alerta'] == 2) {
				echo '<script language="javascript">toastr.success("Editado Correctamente.");</script>';  
			}
			if ($_GET['alerta'] == 3) {
				echo '<script language="javascript">toastr.success("Eliminado Correctamente.");</script>'; 
			}
	}
?>