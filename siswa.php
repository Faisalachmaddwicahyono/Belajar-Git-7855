<?php
	require_once("lib/DBClass.php");
	require_once("lib/m_siswa.php");
	require_once("lib/age.php");
	
	$no=1;
	$siswa = new Siswa();
	$hitungAge = new Age();
	$data = $siswa->readAllSiswa();
	
	/*print '<pre>';
	print_r ($data);
	print '</pre>';
	*/
?>

<table border="1">
	<tr>
		<th>NO</th>
		<th>NIK</th>
		<th>FULL NAME</th>
		<th>NATIONALITY</th>
		<th>DATE BIRTH</th>
		<th>AGE</th>
		<th></th>
	</tr>
	
	<?php foreach($data as $a):?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['nis']; ?></td>
		<td><?php echo $a['full_name']; ?></td>
		<td><?php echo $a['nationality']; ?></td>
		<td><?php echo $a['date_ob']?></td>
		<td><?php 	
				$tanggal = $a['date_ob'];
				$exec = $hitungAge->age($tanggal);
				if(empty($tanggal)){
					echo "Tanggal Lahir Tidak Diketahui";
				}else{
					echo $exec->y."tahun ".$exec->m."bulan ".$exec->d."hari ";
				}
		?></td>
		<td>
			<a href ="dsiswa.php?a=<?php echo $a["id_siswa"]?>">
				Detail
			</a>
		</td>
		
		<td>
			<a href ="usiswa.php?a=<?php echo $a["id_siswa"]?>">
				Edit
			</a>
		</td>
		
		<td>
			<a href ="delsiswa.php?a=<?php echo $a["id_siswa"]?>">
				Delete
			</a>
		</td>
			
	</tr>
	<?php endforeach;  ?>