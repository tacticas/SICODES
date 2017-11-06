<footer class="footer">
	<div class="container">
        <span class="text-muted pull-right">© Copyright 2018 - Automatix. All rights reserved.</span>
    </div>
</footer>
<!-- SCRIPTS -->
<script type="text/javascript" src="assets/bootstrap4/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/bootstrap4/js/tether.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap4/js/notify.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap4/js/custom.js"></script>


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