<?php
	if(!empty($_GET['save'])) {
	    $data = "Data Pemantaun Covid19 wilayah ".$_GET['nama_wilayah']."\r\nPer ".date('d F Y H:i:s')." (Waktu dan Jam Sekarang)\r\n".$_GET['nama_operator']."/".$_GET['nim_mahasiswa']."\r\n \r\n";
	    $data .= "Positif : ".$_GET['jumlah_positif']."\r\nDirawat : ".$_GET['jumlah_dirawat']."\r\nSembuh : ".$_GET['jumlah_sembuh']."\r\nMeninggal : ".$_GET['jumlah_meninggal'];
	    $ret = file_put_contents('data.txt', $data, FILE_APPEND | LOCK_EX);
	    if($ret === false) {
	        die('There was an error writing this file');
	    }
	    else {
	        echo "$ret bytes written to file";
	    }
	}
	else if(!empty($_GET['show'])){
?>
	<center>
		<p>Data Pemantaun Covid19 wilayah <?php echo $_GET['nama_wilayah'];?></p>
		<p>Per <?php echo date("d F Y H:i:s");?> (Waktu dan Jam Sekarang)</p>
		<p><?php echo $_GET['nama_operator'];?>/<?php echo $_GET['nim_mahasiswa'];?></p>

		<hr />
		<br />

		<table cellpadding="20">
			<tr style="background-color: aqua; border: solid 1px #ddd;">
				<td>Positif</td>
				<td>Dirawat</td>
				<td>Sembuh</td>
				<td>Meninggal</td>
			</tr>
			<tr>
				<td><?php echo $_GET['jumlah_positif'];?></td>
				<td><?php echo $_GET['jumlah_dirawat'];?></td>
				<td><?php echo $_GET['jumlah_sembuh'];?></td>
				<td><?php echo $_GET['jumlah_meninggal'];?></td>
			</tr>
		</table>
	</center>
<?php
	} else {
	   die('no post data to process');
	}
?>