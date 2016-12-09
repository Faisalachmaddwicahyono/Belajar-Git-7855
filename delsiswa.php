<?php
require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');

$id=$_GET['a'];

if(!is_numeric($id)){
	exit('Access Forbiden');	
}

$siswa=new Siswa();
$data=$siswa->deleteSiswa($id);

if(empty($data)){
	Echo "Data Berhasil Dihapus";
}
?>

<br/>
<a href="siswa.php">Kembali</a>