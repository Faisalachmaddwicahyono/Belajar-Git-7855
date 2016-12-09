<?php
require_once("lib/DBClass.php");
require_once("lib/m_siswa.php");
require_once("lib/m_nationality.php");
	
$id = $_GET['a'];

if(!is_numeric($id)){
	exit("Access Forbidden");
}

$siswa = new Siswa();
$data = $siswa->readSiswa($id);

$nation = new nationality();
$data_nation = $nation->readAllNationality();

if(empty($data)){
	exit("Siswa is not found");
}

$dt = $data[0];
?>

<h1>Edit Data Siswa</h1>
<form action="editsiswa.php" method="post" enctype="multipart/form-data">
	NIS:<br />
	<input type="text" value="<?php echo $dt['id_siswa']?>"
		name="in_nis" readonly="true"><br />
	Nama Lengkah:<br />
	<input type="text" name="in_name" value="<?php echo $dt['full_name']?>"><br />
	Email:<br />
	<input type="text" name="in_email" value="<?php echo $dt['email']?>"><br />
	Kewarganegaraan: <br />
	<select name="in_nation">
		<option value=""> --pilih negara--</option>
		<?php foreach($data_nation as $n): ?>
		<?php $s = ($dt["id_nationality"]==$n["id_nationality"])?"selected":""?>
		<option value="<?php echo $n ['id_nationality']?>">
			<?php echo $n['nationality']?>
		</option>
		<?php endforeach ?>
	</select><br />
	FOTO: <input type="file" name="in_foto" /><br />
	<?php if(!empty($dt['foto'])):?>
		<img src="<?php echo $dt['foto']?>" width="100" />
	<?php endif?><br />
	<input type="submit" name="kirim" value="Simpan">
</form>