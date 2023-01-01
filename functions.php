<?php
$conn = mysqli_connect("localhost","root","","db_oprec");

function query($query)
{
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ($row = mysqli_fetch_array($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function tambahuser($data)
{
	global $conn;

	$username = strtolower(stripcslashes($data['username'])); 
	$password =mysqli_real_escape_string($conn,$data['password']);
	$passwordverif =mysqli_real_escape_string($conn,$data['passwordverif']);
	$level = $data['level'];

	if ($password !== $passwordverif) {
		echo"
		<script>
		alert('password tidak sesuai!');
		</script>
		";

		return false;
	}

	$result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'	");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
		alert('Username Sudah Terdaftar!');
		</script>";

		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	$query = "INSERT INTO `user` VALUES ('','$username','$password','$level')";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);

}
function tambahmhs($data)
{
	global $conn;
	$npm = htmlspecialchars($data['npm']);
	$nama = htmlspecialchars($data['nama']);
	$jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
	$tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
	$jurusan = htmlspecialchars($data['jurusan']);
	$prodi = htmlspecialchars($data['prodi']);
	$berkas = upload();
	$skor = htmlspecialchars($data['skor']);
	$status = htmlspecialchars($data['status']);
	$id_user = htmlspecialchars($data['id_user']);
	$id_periode = htmlspecialchars($data['id_periode']);

	if (!$berkas) {
		return false;
	}


	$query = "INSERT INTO `tb_pendaftar` (`id_mhs`, `npm`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `id_jurusan`, `id_prodi`, `berkas`, `skor`,
`status`,`id_user`,`id_periode`) VALUES ('','$npm','$nama','$jenis_kelamin','$tanggal_lahir','$jurusan','$prodi','$berkas','$skor','$status','$id_user','$id_periode')";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}
		
 function upload()
{
	$namaFile = $_FILES['berkas']['name'];
	$ukuranFile = $_FILES['berkas']['size'];
	$error = $_FILES['berkas']['error'];
	$tmpName = $_FILES['berkas']['tmp_name'];

	if ($error === 4) {
		echo "<script>
		alert('Masukkan Berkas Pendaftaran Terlebih Dahulu!')
		</script>";

		return false;
	}

	$ekstensiFile = ['pdf'];
	$cekFile = explode('.', $namaFile);
	$cekFile = strtolower(end($cekFile));

	if (!in_array($cekFile, $ekstensiFile)) {
			echo "<script>
		alert('File yang ada masukkan tidak sesuai!')
		</script>";

		return false;	
	}
	if ($ukuranFile > 1000000) {
		echo "<script>
		alert('Ukuran file terlalu besar!')
		</script>";

		return false;
	}

	$namaFileTemp = uniqid();
	$namaFileTemp .= '.';
	$namaFileTemp .= $cekFile;

	move_uploaded_file($tmpName, 'berkas/' . $namaFileTemp);

	return $namaFileTemp;
}

 function listProdi($data)
                {
                  
                $query = "SELECT id_prodi, program_studi FROM tb_prodi WHERE id_jurusan = '$data'";
                $result = mysqli_query($conn,$query);
                while($data = mysqli_fetch_assoc()):
                      $dataset = $row;
                    endwhile;
                    if (!empty($dataset)) return $dataset;
                }

function hapus($id_mhs){
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_pendaftar WHERE id_mhs = $id_mhs");
	return mysqli_affected_rows($conn);
}

function hapus_akun($id_user){
	global $conn;
	mysqli_query($conn, "DELETE FROM user WHERE id_user = $id_user");
	return mysqli_affected_rows($conn);
}

function status_periode($id_periode){
	global $conn;
	mysqli_query($conn, "UPDATE periode SET status = 'Selesai' WHERE id_periode='$id_periode'");
	return mysqli_affected_rows($conn);
}
function cancel_periode($id_periode){
	global $conn;
	mysqli_query($conn, "UPDATE periode SET status = 'Aktif' WHERE id_periode='$id_periode'");
	return mysqli_affected_rows($conn);
}

function cari($keywoard){
	global $conn;
	mysqli_query($conn, "SELECT * FROM tb_pendaftar WHERE nama ='$keywoard'");
	return mysqli_affected_rows($conn);
}

function updateuser($data)
{
	global $conn;
	
	$passwordlama = $_POST['passwordlama'];
	$passwordbaru = $_POST['passwordbaru'];
	$passwordverif = $_POST['passwordverif'];
	$id_user = $_POST['id_user'];
	$cekuser = "SELECT * from user WHERE id_user = '$id_user' and password = '$passwordlama'";

	$querycekuser = mysqli_query($conn, $cekuser);
	$count = mysqli_num_rows($querycekuser);

	if ($count >= 1){
	$passwordPalingBaru = password_hash($passwordbaru, PASSWORD_DEFAULT);
	$updatepassword = "UPDATE user SET password = '$passwordPalingBaru' WHERE id_user = '$id_user'";
	mysqli_query($conn, $updatepassword);
	return mysqli_affected_rows($conn);
	}
}

function editMahasiswa($data)
{
	global $conn;
	$id_mhs = $data['id_mhs'];
	$npm = htmlspecialchars($data['npm']);
	$nama = htmlspecialchars($data['nama']);
	$jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
	$tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
	$id_jurusan = htmlspecialchars($data['id_jurusan']);
	$id_prodi = htmlspecialchars($data['id_prodi']);
	$query = "UPDATE tb_pendaftar SET
						npm = '$npm',
						 nama = '$nama',
						 jenis_kelamin = '$jenis_kelamin',
						tanggal_lahir= '$tanggal_lahir',
						 id_jurusan = '$id_jurusan',
						 id_prodi = '$id_prodi'
						WHERE id_mhs = '$id_mhs'";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function lupapaw($data)
{
	global $conn;

	$username = strtolower(stripcslashes($data['username'])); 
	$password =mysqli_real_escape_string($conn,$data['password']);
	$passwordverif =mysqli_real_escape_string($conn,$data['passwordverif']);

	if ($password !== $passwordverif) {
		echo"
		<script>
		alert('password tidak sesuai!');
		</script>
		";

		return false;
	}
	$result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'	");
	if (mysqli_fetch_assoc($result)) {
		$password = password_hash($password, PASSWORD_DEFAULT);

	$query = "UPDATE user SET password = '$password' WHERE username = '$username'";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
	}
}
function penilaianMhs($data)
{
	global $conn;
	$id_mhs = $data['id_mhs'];
	$skor = htmlspecialchars($data['skor']);
	$status = htmlspecialchars($data['status']);

	$query = "UPDATE tb_pendaftar SET skor = '$skor', status='$status' WHERE id_mhs = '$id_mhs'";
mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}
function tambahperiode($data)
{
	global $conn;

	$periode = htmlspecialchars(stripcslashes($data['periode'])); 
	$nama_presiden = htmlspecialchars(stripcslashes($data['nama_presiden'])); 
	$nama_kabinet = htmlspecialchars(stripcslashes($data['nama_kabinet'])); 
	$tgl_pendaftaran = htmlspecialchars(stripcslashes($data['tgl_pendaftaran']));
	$tgl_seleksi = htmlspecialchars(stripcslashes($data['tgl_seleksi']));
	$tgl_pengumuman = htmlspecialchars(stripcslashes($data['tgl_pengumuman']));
	$status = $data['status'];


	$query = "INSERT INTO `periode` VALUES ('','$periode','$nama_presiden','$nama_kabinet','$tgl_pendaftaran',
	'$tgl_seleksi','$tgl_pengumuman','$status')";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);

}
?>