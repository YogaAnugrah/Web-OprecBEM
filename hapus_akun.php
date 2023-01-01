<?php 
require 'functions.php';

$id_user = $_GET["id_user"];

if ( hapus_akun($id_user) > 0 ){
	echo "
		<script>
			alert('Data BERHASIL dihapus');
			document.location.href = 'read_akun.php';
		</script>
		";
	} else {
	echo "
		<script>
			alert('Data GAGAL dihapus');
			document.location.href = 'read_akun.php';
		</script>
	";
	}
?>