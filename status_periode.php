<?php 
require 'functions.php';

$id_periode = $_GET["id_periode"];

if ( status_periode($id_periode) > 0 ){
	echo "
		<script>
			alert('Periode berhasil diubah');
			document.location.href = 'periode.php';
		</script>
		";
	}elseif ( cancel_periode($id_periode) > 0 ){
		echo "
		<script>
			alert('Periode berhasil diubah');
			document.location.href = 'periode.php';
		</script>
		";
	} 
	
	
	
	else {
	echo "
		<script>
			alert('Periode gagal diubah!');
			document.location.href = 'periode.php';
		</script>
	";
	}
?>